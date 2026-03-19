<?php
class Onta_admin extends Controller {
    
    private $userModel;
    private $abstractModel;
    private $inscriptionModel;
    
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->abstractModel = $this->model('AbstractModel');
        $this->inscriptionModel = $this->model('Inscription');
    }

    public function index() {
        if ($this->isAdminLoggedIn()) {
            redirect('onta_admin/dashboard');
        }

        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => ''
        ];

        $this->view('admin/login', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            
            $data = [
                'email' => mb_strtoupper(trim($_POST['email']), 'UTF-8'),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Por favor ingrese su correo';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Por favor ingrese su contraseña';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Check role for admin
                    if ($loggedInUser->role == 'admin') {
                        // Set flag to force preloader on next page load
                        $_SESSION['force_preloader'] = true;
                        $this->createAdminSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Correo o contraseña incorrectos';
                        $this->view('admin/login', $data);
                    }
                } else {
                    $data['password_err'] = 'Correo o contraseña incorrectos';
                    $this->view('admin/login', $data);
                }
            } else {
                $this->view('admin/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('admin/login', $data);
        }
    }

    public function createAdminSession($user) {
        $_SESSION['admin_id'] = $user->id;
        $_SESSION['admin_email'] = $user->email;
        $_SESSION['admin_name'] = $user->name;
        // Optional session security tokens
        redirect('onta_admin/dashboard');
    }

    public function logout() {
        // Unset all session values
        $_SESSION = array();

        // Kill the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        
        // Start a new session just for the preloader flag
        session_start();
        $_SESSION['force_preloader'] = true;

        redirect('onta_admin');
        exit;
    }

    public function dashboard() {
        // Prevent browser caching so "Back" button doesn't show dashboard after logout
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");

        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        // Obtener datos para el panel
        $abstracts = $this->abstractModel->getAllAbstracts();
        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        $users = $this->userModel->getAllUsers();

        $data = [
            'abstracts' => $abstracts,
            'inscriptions' => $inscriptions,
            'users' => $users
        ];
        $this->view('admin/dashboard', $data);
    }

    public function updateAbstractStatus() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['abstract_id'];
            $status = $_POST['status']; // 'pendiente', 'aprobado', 'rechazado'
            
            if ($this->abstractModel->updateStatus($id, $status)) {
                // Redirigir de vuelta al panel de resúmenes
                header('Location: ' . URLROOT . '/onta_admin/dashboard#resumenes');
                exit();
            } else {
                die('Error al actualizar el estado del resumen.');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function updateInscriptionStatus() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['inscription_id'];
            $status = $_POST['status']; // 'pendiente', 'aprobado', 'rechazado'
            
            if ($this->inscriptionModel->updateStatus($id, $status)) {
                // Redirigir de vuelta al panel de pagos
                header('Location: ' . URLROOT . '/onta_admin/dashboard#pagos');
                exit();
            } else {
                die('Error al actualizar el estado de pago.');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function deleteUser($id) {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->deleteUser($id)) {
                redirect('onta_admin/dashboard#inscripciones');
            } else {
                die('Algo salió mal al eliminar el usuario');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function deleteAbstract($id) {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->abstractModel->delete($id)) {
                redirect('onta_admin/dashboard#resumenes');
            } else {
                die('Algo salió mal al eliminar el resumen');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function deleteInscription($id) {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->inscriptionModel->delete($id)) {
                redirect('onta_admin/dashboard#pagos');
            } else {
                die('Algo salió mal al eliminar la inscripción');
            }
        } else {
            redirect('onta_admin/dashboard');
        }
    }

    public function getUserJson($id) {
        if (!$this->isAdminLoggedIn()) {
            http_response_code(403);
            exit();
        }

        $user = $this->userModel->getUserById($id);
        $abstracts = $this->abstractModel->getAbstractsByUserId($id);
        $inscriptions = $this->inscriptionModel->getInscriptionsByUserId($id);

        header('Content-Type: application/json');
        echo json_encode([
            'user' => $user,
            'abstracts' => $abstracts,
            'inscriptions' => $inscriptions
        ]);
        exit();
    }

    public function updateUser() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'dni' => trim($_POST['dni']),
                'phone' => trim($_POST['phone']),
                'university' => trim($_POST['university']),
                'professional_school' => trim($_POST['professional_school']),
                'department' => trim($_POST['department']),
                'user_category' => $_POST['user_category'],
                'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : ''
            ];

            if ($this->userModel->updateByAdmin($data)) {
                redirect('onta_admin/dashboard#inscripciones');
            } else {
                die('Error al actualizar el usuario');
            }
        }
    }

    public function getAbstractJson($id) {
        if (!$this->isAdminLoggedIn()) {
            http_response_code(403);
            exit();
        }

        $abstract = $this->abstractModel->getAbstractById($id);
        header('Content-Type: application/json');
        echo json_encode($abstract);
        exit();
    }

    public function updateAbstract() {
        if (!$this->isAdminLoggedIn()) {
            redirect('onta_admin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'titulo' => trim($_POST['titulo']),
                'autores' => trim($_POST['autores']),
                'afiliacion' => trim($_POST['afiliacion']),
                'correo' => trim($_POST['correo']),
                'keywords' => trim($_POST['keywords'])
            ];

            if ($this->abstractModel->update($data)) {
                redirect('onta_admin/dashboard#resumenes');
            } else {
                die('Error al actualizar el resumen');
            }
        }
    }

    private function isAdminLoggedIn() {
        if (isset($_SESSION['admin_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
