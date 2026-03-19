# Documentación del Framework ONTA

## 1. Tree de carpetas del proyecto

```
onta_dev-main/
├── app/
│   ├── bootstrap.php                          (Inicializa todo el proyecto)
│   ├── core/
│   │   ├── App.php                           (Router principal)
│   │   ├── Controller.php                    (Clase base controllers)
│   │   └── Database.php                      (Clase PDO)
│   ├── controllers/
│   │   ├── Pages.php
│   │   ├── Users.php
│   │   ├── Admin.php
│   │   ├── Inscriptions.php
│   │   └── ...
│   ├── models/
│   │   ├── AbstractModel.php
│   │   ├── User.php
│   │   ├── Committee.php
│   │   └── ...
│   ├── views/
│   │   ├── abstracts/
│   │   ├── admin/
│   │   ├── inscriptions/
│   │   ├── pages/
│   │   ├── search/
│   │   └── users/
│   ├── helpers/
│   │   ├── session_helper.php
│   │   ├── security_helper.php
│   │   ├── url_helper.php
│   │   └── language_helper.php
│   └── lang/
│       ├── en.php, es.php, etc.
├── config/
│   └── config.php                            (Constantes BD, rutas, etc.)
├── public/
│   ├── index.php                             (Punto de entrada)
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   ├── img/
│   │   └── uploads/
│   └── error_log
├── .htaccess
└── README.md
```

## 2. Cómo se define una ruta en el framework

El routing es **automático basado en URL**. En `App.php`:

```
URL Format: /controller/method/params

Ejemplos:
- /users/register                    → UsersController::register()
- /admin/dashboard/123               → AdminController::dashboard('123')
- /pages/index                       → PagesController::index()
- /onta-admin/login                  → Onta_adminController::login()  (guiones se convierten a guiones bajos)
```

**No hay archivo de rutas.** Las URLs se mapean directamente a archivos de controladores:

1. La URL se divide por slashes
2. El primer segmento busca un controlador con ese nombre
3. El segundo segmento busca un método en el controlador
4. Los segmentos restantes son parámetros

## 3. Ejemplo de controlador típico

Estructura básica de un controlador:

```php
<?php
class Users extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('User');  // Carga el modelo
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesar datos
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            // Validaciones aquí...

            // Llamar modelo
            if ($this->userModel->register($data)) {
                flash('register_success', 'Registrado correctamente');
                redirect('users/login');
            } else {
                flash('register_error', 'Error en el registro', 'alert alert-danger');
            }
        }

        // Cargar vista
        $this->view('users/register', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Llamar modelo
            if ($user = $this->userModel->login($email, $password)) {
                // Crear sesión
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->name;
                
                flash('login_success', 'Sesión iniciada correctamente');
                redirect('users/dashboard');
            } else {
                flash('login_error', 'Credenciales inválidas', 'alert alert-danger');
            }
        }

        $this->view('users/login');
    }
}
?>
```

**Métodos heredados de `Controller`:**
- `$this->model('NombreModelo')` - Carga y devuelve una instancia del modelo
- `$this->view('ruta/vista', $data)` - Carga y renderiza una vista con datos

## 4. Cómo se hacen las consultas PDO

Las consultas se hacen **directamente en los Modelos**, usando la clase `Database.php`:

```php
<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();  // Instancia del helper PDO
    }

    // Consulta de login
    public function login($email, $password) {
        // Preparar consulta
        $this->db->query('SELECT * FROM users WHERE email = :email');
        
        // Bind parámetros (previene SQL injection)
        $this->db->bind(':email', $email);

        // Ejecutar y obtener resultado
        $row = $this->db->single();  // Un solo registro

        if ($row) {
            if (password_verify($password, $row->password)) {
                return $row;  // Devuelve objeto
            }
        }
        return false;
    }

    // Consulta de registro
    public function register($data) {
        // INSERT con múltiples parámetros
        $this->db->query('INSERT INTO users (name, email, password, user_category, dni, university) 
                          VALUES(:name, :email, :password, :user_category, :dni, :university)');
        
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':user_category', $data['user_category']);
        $this->db->bind(':dni', $data['dni']);
        $this->db->bind(':university', $data['university']);

        return $this->db->execute();  // Devuelve true/false
    }

    // Consulta SELECT múltiples registros
    public function getAllUsers() {
        $this->db->query('SELECT * FROM users ORDER BY id DESC');
        return $this->db->resultSet();  // Array de objetos
    }

    // Consulta UPDATE
    public function updateUser($id, $data) {
        $this->db->query('UPDATE users SET name = :name, email = :email WHERE id = :id');
        
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);

        return $this->db->execute();
    }
}
?>
```

### Métodos disponibles de `Database.php`

| Método | Descripción |
|--------|------------|
| `query($sql)` | Prepara la consulta SQL |
| `bind($param, $value, $type)` | Asigna valores a los placeholders |
| `execute()` | Ejecuta la consulta preparada, devuelve `true/false` |
| `single()` | Devuelve un registro como objeto |
| `resultSet()` | Devuelve todos los registros como array de objetos |
| `rowCount()` | Devuelve la cantidad de filas afectadas |

### Tipos de datos en bind()

```php
// Tipo automático (detectado)
$this->db->bind(':name', 'Juan');           // STRING
$this->db->bind(':age', 25);                // INT
$this->db->bind(':active', true);           // BOOL
$this->db->bind(':data', null);             // NULL

// Tipo explícito
$this->db->bind(':id', $id, PDO::PARAM_INT);
$this->db->bind(':email', $email, PDO::PARAM_STR);
$this->db->bind(':active', $bool, PDO::PARAM_BOOL);
```

## 5. Arquitectura General

```
URL Request
    ↓
public/index.php (Punto de entrada)
    ↓
app/bootstrap.php (Cargar configuración y helpers)
    ↓
app/core/App.php (Router - Mapea URL a controlador)
    ↓
app/controllers/[Controlador].php
    ↓
app/models/[Modelo].php (Consultas PDO)
    ↓
app/core/Database.php (Clase PDO)
    ↓
Base de Datos
    ↓
Resultado
    ↓
app/views/[Vista].php (Renderizar HTML)
    ↓
Response al navegador
```

## 6. Configuración

Archivo: `config/config.php`

```php
<?php
// Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ubvwmzhw_onta');

// App Root
define('APPROOT', dirname(dirname(__FILE__)) . '/app');

// URL Root (ajustar según el servidor)
define('URLROOT', 'http://localhost/onta/');

// Site Name
define('SITENAME', 'ONTA PERU 2026');

// App Version
define('APPVERSION', '1.0.0');

// Debug Mode
define('DEBUG', false);

// reCAPTCHA Keys
define('RECAPTCHA_SITE_KEY', '...');
define('RECAPTCHA_SECRET_KEY', '...');
?>
```

## 7. Helpers disponibles

- **session_helper.php**: `isLoggedIn()`, `flash()`
- **url_helper.php**: `redirect()`, `base_url()`
- **security_helper.php**: `validate_csrf()`, `h()` (escape HTML)
- **language_helper.php**: `initLanguage()`, `lang()`

## 8. Flujo típico de una solicitud POST

```
1. Usuario envía formulario POST
   ↓
2. Controlador recibe solicitud en método
   ↓
3. Validar CSRF: validate_csrf()
   ↓
4. Sanitizar datos: filter_input_array()
   ↓
5. Validar datos del formulario
   ↓
6. Llamar método del modelo
   ↓
7. Modelo ejecuta consulta PDO preparada
   ↓
8. Si válido: flash() + redirect()
   ↓
9. Si error: flash() + cargar vista con errores
```
