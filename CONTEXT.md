# CONTEXT.md — Sistema de Asistencia por QR
## Congreso de Investigación — Framework ONTA (PHP MVC propio)

> Adjuntar este archivo al inicio de cada sesión con el agente.
> No repetir información ya documentada aquí.

---

## Stack técnico

| Capa | Tecnología |
|------|-----------|
| Framework | ONTA (PHP MVC propio) |
| Base de datos | MySQL + PDO (clase Database.php) |
| App escáner | Flutter (Android) |
| QR generation | PHP: endroid/qr-code (vía Composer) |
| Deploy | Railway.app |

---

## Convenciones del framework ONTA

### Routing automático por URL
```
/controller/method/param  →  app/controllers/Controller.php::method($param)
```
No hay archivo de rutas. Ejemplos para este sistema:
```
/attendance/qr            → Attendance::qr()         (vista QR del usuario)
/attendance/scan          → Attendance::scan()        (recibe POST del APK)
/attendance/list          → Attendance::list()        (panel admin)
/api/token                → Api::token()              (login APK, devuelve Bearer)
/api/scan                 → Api::scan()               (endpoint JSON para Flutter)
/api/qr                   → Api::qr()                 (imagen PNG del QR)
```

### Patrón de controlador
```php
class NombreController extends Controller {
    private $modelo;
    public function __construct() {
        $this->modelo = $this->model('NombreModelo');
    }
    public function metodo($param = null) {
        // POST: $_SERVER['REQUEST_METHOD'] == 'POST'
        // Vista: $this->view('carpeta/vista', $data)
        // Redirect: redirect('controller/method')
        // Flash: flash('key', 'mensaje', 'clase-css')
    }
}
```
 
### Patrón de modelo (PDO)
```php
class NombreModelo {
    private $db;
    public function __construct() { $this->db = new Database(); }

    public function metodo($param) {
        $this->db->query('SELECT * FROM tabla WHERE id = :id');
        $this->db->bind(':id', $param);
        return $this->db->single();       // un registro como objeto
        // return $this->db->resultSet(); // múltiples registros (array de objetos)
        // return $this->db->execute();   // INSERT/UPDATE/DELETE → bool
    }
}
```

### Métodos Database.php disponibles
| Método | Retorna |
|--------|---------|
| `query($sql)` | prepara la consulta |
| `bind($param, $value)` | bind con detección automática de tipo |
| `execute()` | bool |
| `single()` | objeto |
| `resultSet()` | array de objetos |
| `rowCount()` | int |

### Helpers disponibles
- `isLoggedIn()` — verifica sesión activa
- `flash('key', 'msg', 'clase')` — mensaje flash
- `redirect('controller/method')` — redirección
- `validate_csrf()` — validar token CSRF
- `h($str)` — escape HTML

### Sesión del usuario autenticado
```php
$_SESSION['user_id']    // int
$_SESSION['user_name']  // string
```

---

## Archivos existentes relevantes (NO modificar)

```
app/controllers/Users.php       — login, register, dashboard
app/models/User.php             — modelo de usuarios
app/views/users/dashboard.php   — dashboard del usuario (solo agregar include aquí)
config/config.php               — constantes globales
app/core/App.php                — router
app/core/Controller.php         — clase base
app/core/Database.php           — PDO helper
```

---

## Tablas nuevas a crear (SQL directo — ONTA no tiene migraciones)

```sql
-- Columnas adicionales en users existente
ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'attendee';
ALTER TABLE users ADD COLUMN api_token VARCHAR(64) DEFAULT NULL;
-- Roles: attendee | scanner | admin

-- Evento del congreso
CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  event_date DATE NOT NULL,
  location VARCHAR(255),
  active TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tokens QR por usuario/evento
CREATE TABLE attendance_tokens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  event_id INT NOT NULL,
  token VARCHAR(64) UNIQUE NOT NULL,
  expires_at DATETIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (event_id) REFERENCES events(id)
);

-- Registro de asistencia
CREATE TABLE attendance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  event_id INT NOT NULL,
  token_used VARCHAR(64) NOT NULL,
  scanned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  scanner_id INT,
  UNIQUE KEY unique_attendance (user_id, event_id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (event_id) REFERENCES events(id)
);

-- Evento de prueba
INSERT INTO events (name, event_date, location, active)
VALUES ('Congreso de Investigación 2026', '2026-06-15', 'Auditorio Principal', 1);
```

---

## Archivos nuevos a crear

```
app/controllers/Attendance.php          — vista QR web + panel admin
app/controllers/Api.php                 — endpoints JSON para Flutter
app/models/AttendanceTokenModel.php     — generar/validar tokens
app/models/AttendanceModel.php          — registrar/consultar asistencia
app/models/EventModel.php              — obtener evento activo
app/views/attendance/qr.php            — tarjeta QR del usuario
app/views/attendance/list.php          — lista admin
app/helpers/qr_helper.php             — genera imagen QR (endroid/qr-code)
config/qr_config.php                   — constantes del sistema QR
composer.json                          — solo endroid/qr-code
```

---

## Lógica del token QR

```php
// Generación (en AttendanceTokenModel::generateForUser)
$token = hash('sha256', $user_id . '|' . $event_id . '|' . QR_SECRET . '|' . time());
$expires_at = date('Y-m-d H:i:s', strtotime('+' . QR_EXPIRES_HOURS . ' hours'));
// Si ya existe token para user+event: UPDATE (reemplazar)
// Si no existe: INSERT

// El QR contiene SOLO el token string (64 chars hex)
// NO incluir datos personales en el QR

// Validación al escanear (AttendanceTokenModel::validate):
// 1. Buscar token en attendance_tokens → si no existe: invalid_token
// 2. Verificar expires_at > NOW()       → si expiró: expired_token
// 3. Buscar en attendance (user_id+event_id) → si existe: already_registered
// 4. Todo OK → retornar objeto con user_id y event_id
```

---

## Constantes en config/qr_config.php

```php
<?php
define('QR_SECRET',        'cambiar_por_valor_aleatorio_seguro');
define('QR_EXPIRES_HOURS',  24);
define('QR_SIZE',           300);  // px
define('SCANNER_ROLE',     'scanner');
?>
// Incluir este archivo en app/bootstrap.php
```

---

## API endpoints para Flutter (Api.php)

Todas las respuestas son JSON. Auth: header `Authorization: Bearer {api_token}`.

```php
// Patrón base del controlador Api.php
class Api extends Controller {

    // Enviar JSON y terminar
    private function json($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    // Verificar Bearer token — retorna objeto user o llama json(401)
    private function authBearer() {
        $headers = getallheaders();
        $auth = $headers['Authorization'] ?? '';
        if (!str_starts_with($auth, 'Bearer ')) $this->json(['status' => 'unauthorized'], 401);
        $token = substr($auth, 7);
        $user = $this->userModel->findByApiToken($token);
        if (!$user) $this->json(['status' => 'unauthorized'], 401);
        return $user;
    }
}
```

### POST /api/token — login APK
```
Body (form-data o JSON): email, password
200: { "status": "ok", "api_token": "abc...", "name": "Juan" }
401: { "status": "invalid_credentials" }
```

### POST /api/scan — escanear QR
```
Header: Authorization: Bearer {api_token}
Body JSON: { "token": "abc123..." }
200: { "status": "ok",               "user": { "id": 1, "name": "Ana García" } }
409: { "status": "already_registered","scanned_at": "2026-06-15 09:00:00" }
401: { "status": "invalid_token" }
422: { "status": "expired_token" }
```

### GET /api/qr — imagen PNG del QR (usada también desde la web)
```
Header: Authorization: Bearer {api_token}  (o sesión web activa)
200: imagen PNG directa (Content-Type: image/png)
```

---

## APK Flutter — estructura

```
lib/
  main.dart
  config.dart                   — const String baseUrl = 'https://....railway.app';
  screens/
    login_screen.dart           — POST /api/token
    scanner_screen.dart         — mobile_scanner + POST /api/scan
    result_screen.dart          — muestra respuesta (verde/amarillo/rojo)
  services/
    api_service.dart            — Dio client con Bearer token
```

Paquetes Flutter:
```yaml
mobile_scanner: ^5.0.0
dio: ^5.0.0
shared_preferences: ^2.0.0
```

---

## Lo que NO hacer

- No modificar archivos en `app/core/`
- No modificar `app/controllers/Users.php`
- No crear sistema de rutas (el routing automático de ONTA funciona por convención)
- No usar sesiones PHP para autenticar la APK (usar Bearer token en `api_token`)
- No almacenar datos personales dentro del QR
- No instalar frameworks externos (Laravel, Slim, etc.)
- No usar WebSockets ni colas (fuera del alcance del prototipo)
