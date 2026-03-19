# PROMPTS.md — Instrucciones por fase para agente
## Sistema QR Asistencia — Framework ONTA

> Usar UN prompt por sesión. Adjuntar siempre CONTEXT.md junto a este archivo.
> Cada prompt asume que el anterior fue completado y testeado.

---

## FASE 1 — Base de datos y modelos

```
Contexto: [adjuntar CONTEXT.md]

Proyecto: sistema de asistencia QR para un congreso, sobre el framework
ONTA (PHP MVC propio con routing automático y PDO).

Tarea:
1. Proporcionar el SQL completo para ejecutar en MySQL:
   - ALTER TABLE users (agregar columnas role y api_token según CONTEXT.md)
   - CREATE TABLE events
   - CREATE TABLE attendance_tokens
   - CREATE TABLE attendance
   - INSERT del evento de prueba

2. Crear app/models/EventModel.php:
   - getActiveEvent(): retorna objeto del evento con active=1, o null

3. Crear app/models/AttendanceTokenModel.php:
   - generateForUser($user_id, $event_id): genera token SHA256, hace
     INSERT o UPDATE si ya existía uno para ese user+event, retorna el token string
   - getByUserId($user_id, $event_id): retorna objeto token o null
   - validate($token_string): retorna objeto con user_id/event_id si válido,
     o string 'invalid'/'expired'/'already_registered'

4. Crear app/models/AttendanceModel.php:
   - register($user_id, $event_id, $token, $scanner_id): INSERT en attendance,
     retorna bool. Usar INSERT IGNORE para respetar el UNIQUE constraint.
   - getByEvent($event_id): retorna array de objetos (para panel admin)
   - hasAttendance($user_id, $event_id): retorna bool

5. Agregar en app/models/User.php (sin borrar lo existente):
   - findByApiToken($token): SELECT WHERE api_token = :token, retorna objeto o null
   - saveApiToken($user_id, $token): UPDATE api_token WHERE id

Restricciones:
- Seguir exactamente el patrón Database.php de CONTEXT.md
- Sin ORM, sin migraciones, solo PDO directo
- generateForUser debe hacer INSERT ... ON DUPLICATE KEY UPDATE para atomicidad
```

---

## FASE 2 — Helper QR + configuración Composer

```
Contexto: [adjuntar CONTEXT.md]
Estado: Fase 1 completada (tablas creadas, modelos funcionando).

Tarea:
1. Crear composer.json en la raíz del proyecto con solo endroid/qr-code ^3.0

2. Crear app/helpers/qr_helper.php:
   - función generate_qr_png($token_string, $size = QR_SIZE): string
     · Usa endroid/qr-code para generar PNG en memoria
     · Retorna los bytes PNG como string (para enviar como imagen o base64)
   - función generate_qr_base64($token_string, $size = QR_SIZE): string
     · Retorna PNG en base64 para usar en <img src="data:image/png;base64,...">

3. Crear config/qr_config.php con las constantes de CONTEXT.md
   (QR_SECRET, QR_EXPIRES_HOURS, QR_SIZE, SCANNER_ROLE)

4. Agregar en app/bootstrap.php (al final del archivo, sin borrar nada):
   require_once APPROOT . '/../vendor/autoload.php';
   require_once APPROOT . '/../config/qr_config.php';
   require_once APPROOT . '/helpers/qr_helper.php';

Restricciones:
- endroid/qr-code v3.x (no v4, requiere PHP 8.1+)
- El helper no debe escribir archivos en disco, solo retornar bytes en memoria
- Si Composer no está disponible en el servidor, incluir alternativa con
  la librería phpqrcode (un solo archivo .php, sin dependencias)
```

---

## FASE 3 — Controlador API (endpoints para Flutter)

```
Contexto: [adjuntar CONTEXT.md]
Estado: Fases 1 y 2 completadas.

Tarea: Crear app/controllers/Api.php con estos métodos:

1. token() — POST /api/token
   - Leer email y password del body (JSON o form-data)
   - Verificar credenciales con modelo User existente (mismo método de login)
   - Generar api_token: bin2hex(random_bytes(32))
   - Guardar con User::saveApiToken()
   - Responder: {"status":"ok","api_token":"...","name":"..."}
   - Error: {"status":"invalid_credentials"} → HTTP 401

2. scan() — POST /api/scan
   - Verificar Bearer token con authBearer() (patrón en CONTEXT.md)
   - Verificar que el usuario tiene role = SCANNER_ROLE
   - Leer body JSON: {"token":"..."}
   - Llamar AttendanceTokenModel::validate($token)
   - Según resultado:
     · 'invalid'           → json 401 {"status":"invalid_token"}
     · 'expired'           → json 422 {"status":"expired_token"}
     · 'already_registered'→ json 409 {"status":"already_registered","scanned_at":"..."}
     · objeto válido       → AttendanceModel::register() → json 200 {"status":"ok","user":{...}}

3. qr() — GET /api/qr
   - Verificar sesión web (isLoggedIn()) O Bearer token
   - Si no autenticado → json 401
   - Obtener evento activo con EventModel::getActiveEvent()
   - Obtener o generar token con AttendanceTokenModel::getByUserId() /
     generateForUser()
   - Enviar imagen PNG: header('Content-Type: image/png') + echo generate_qr_png($token)

Restricciones:
- Cada método debe llamar exit() al final (json() ya lo hace)
- No usar $_SESSION para autenticar /api/scan (solo Bearer)
- /api/qr acepta ambos métodos de auth (sesión web Y Bearer)
- Agregar header CORS en el constructor: header('Access-Control-Allow-Origin: *')
```

---

## FASE 4 — Controlador web y vista QR en dashboard

```
Contexto: [adjuntar CONTEXT.md]
Estado: Fases 1-3 completadas. API funcionando y testeada con Postman/curl.

Tarea:
1. Crear app/controllers/Attendance.php:
   - qr(): requiere isLoggedIn() o redirect('users/login')
     · Obtener evento activo
     · Obtener o generar token del usuario
     · Pasar a vista: $data['event'], $data['token'], $data['has_attended']
   - list(): requiere role admin o redirect
     · Obtener todos los registros del evento activo con JOIN a users
     · Pasar array a vista para mostrar tabla

2. Crear app/views/attendance/qr.php:
   - Tarjeta centrada con:
     · Nombre del usuario y nombre del evento
     · Imagen QR: <img src="/api/qr" ...> (se sirve vía controlador Api)
     · Badge de estado: "Pendiente" (gris) o "Asistencia registrada ✓" (verde)
     · Botón "Actualizar QR" — hace fetch('/api/qr') y reemplaza el src de la imagen
   - Estilos inline o clase CSS compatible con el proyecto existente
   - Si no hay evento activo: mostrar aviso "No hay evento activo actualmente"

3. Agregar en app/views/users/dashboard.php (sin borrar contenido existente):
   - Incluir sección QR en el lugar apropiado del layout:
     <?php require_once APPROOT . '/views/attendance/qr.php'; ?>
   - Pasar $attendanceData al dashboard desde Users::dashboard() si es necesario

4. Crear app/views/attendance/list.php:
   - Tabla HTML: nombre, email, hora de escaneo, escaneado por
   - Total de asistentes al final

Restricciones:
- No usar JavaScript frameworks, solo fetch() nativo para el botón
- El QR se carga como imagen desde /api/qr, no como base64 embebido en el HTML
- Respetar el layout y CSS existente del proyecto
```

---

## FASE 5 — APK Flutter

```
Contexto: [adjuntar CONTEXT.md]
Estado: API desplegada en Railway. URL base conocida.
URL base: https://[COMPLETAR].railway.app

Tarea — crear estos archivos Flutter:

1. lib/config.dart
   const String baseUrl = 'https://[URL].railway.app';

2. lib/services/api_service.dart
   - Dio client con baseUrl e interceptor que agrega Bearer token
   - login(email, password): POST /api/token → guarda api_token en SharedPreferences
   - scanQr(token): POST /api/scan → retorna Map con status + datos
   - logout(): elimina api_token de SharedPreferences

3. lib/screens/login_screen.dart
   - Campos email y contraseña + botón Login
   - Llama api_service.login()
   - Si ok: navegar a ScannerScreen (pushReplacement)
   - Si error: mostrar SnackBar con mensaje

4. lib/screens/scanner_screen.dart
   - MobileScanner widget en 2/3 de la pantalla
   - Al detectar QR: deshabilitar scanner 2s (cooldown anti-doble)
   - Llamar api_service.scanQr(qrValue)
   - Navegar a ResultScreen con la respuesta (pushReplacement)
   - Botón logout en AppBar

5. lib/screens/result_screen.dart
   - 200 ok:               fondo verde,    nombre del asistente, "Asistencia registrada"
   - 409 already_registered: fondo amarillo, "Ya registrado", hora previa
   - 401 invalid_token:    fondo rojo,     "QR inválido"
   - 422 expired_token:    fondo naranja,  "QR expirado"
   - Botón "Escanear otro" + auto-regreso a ScannerScreen en 3 segundos

6. lib/main.dart — MaterialApp con rutas nombradas

pubspec.yaml — agregar:
  mobile_scanner: ^5.0.0
  dio: ^5.0.0
  shared_preferences: ^2.0.0

Restricciones:
- Target: Android (APK debug). No optimizar para iOS.
- La URL base en config.dart debe ser fácil de cambiar para producción
- Usar Navigator.pushReplacement para no acumular pantallas en el stack
- No implementar cola offline en esta fase
```

---

## FASE 6 — Deploy Railway

```
Contexto: [adjuntar CONTEXT.md]
Estado: Todo funcionando localmente. Listo para desplegar.

Tarea:
1. Crear Dockerfile para el proyecto ONTA:
   - Base: php:8.2-apache
   - Instalar: pdo_mysql, Composer
   - Copiar proyecto, instalar dependencias Composer
   - DocumentRoot apuntando a /public
   - Habilitar mod_rewrite para el .htaccess de ONTA

2. Crear railway.toml:
   - build con Dockerfile
   - Variables de entorno necesarias (sin valores reales):
     DB_HOST, DB_USER, DB_PASS, DB_NAME, QR_SECRET

3. Verificar config/config.php para que lea variables de entorno:
   define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
   (mismo patrón para DB_USER, DB_PASS, DB_NAME)

4. Verificar config/qr_config.php:
   define('QR_SECRET', getenv('QR_SECRET') ?: 'dev_secret');

5. Instrucciones paso a paso para:
   a. Crear proyecto en Railway desde GitHub
   b. Agregar MySQL plugin en Railway
   c. Configurar variables de entorno
   d. Ejecutar el SQL de las tablas (vía Railway DB console)
   e. Obtener la URL pública y actualizar config.dart en Flutter

Restricciones:
- El Dockerfile debe ser minimal (sin Node, sin extras innecesarios)
- CORS ya está en Api.php (Access-Control-Allow-Origin: *), verificar que funcione
- No hardcodear credenciales en ningún archivo commiteado
```

---

## Prompt de debugging rápido

```
Contexto: [adjuntar CONTEXT.md]

Estoy en la Fase [X] del sistema QR de asistencia sobre el framework ONTA.

Error:
[pegar error completo]

Archivo con el problema:
[pegar solo el método o función relevante]

¿Cuál es la causa y cómo lo corrijo manteniendo las convenciones de ONTA?
```
