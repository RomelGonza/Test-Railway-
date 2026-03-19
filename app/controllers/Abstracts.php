<?php
class Abstracts extends Controller {
    private $abstractModel;

    public function __construct() {
        $this->abstractModel = $this->model('AbstractModel');
    }

    // List abstracts for current user
    public function index() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $abstracts = $this->abstractModel->getAbstractsByUserId($_SESSION['user_id']);
        $data = [
            'abstracts' => $abstracts
        ];
        $this->view('abstracts/index', $data);
    }

    // Submit a new abstract
    public function submit() {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'authors' => trim($_POST['authors']),
                'affiliation' => trim($_POST['affiliation']),
                'content' => trim($_POST['content']),
                'title_err' => '',
                'authors_err' => '',
                'affiliation_err' => '',
                'content_err' => ''
            ];

            // Validation logic... (simplified for now)
            if (empty($data['title'])) $data['title_err'] = 'Por favor ingrese el título del resumen';
            if (empty($data['authors'])) $data['authors_err'] = 'Por favor ingrese los autores';
            if (empty($data['affiliation'])) $data['affiliation_err'] = 'Por favor ingrese su afiliación';
            if (empty($data['content'])) $data['content_err'] = 'Por favor ingrese el contenido del resumen';

            if (empty($data['title_err']) && empty($data['authors_err']) && empty($data['affiliation_err']) && empty($data['content_err'])) {
                if ($this->abstractModel->submit($data)) {
                    flash('abstract_success', 'Su resumen ha sido enviado exitosamente');
                    redirect('abstracts/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('abstracts/submit', $data);
            }

        } else {
            $data = [
                'title' => '',
                'authors' => '',
                'affiliation' => '',
                'content' => '',
                'title_err' => '',
                'authors_err' => '',
                'affiliation_err' => '',
                'content_err' => ''
            ];
            $this->view('abstracts/submit', $data);
        }
    }
    // Public check status
    public function checkStatus() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $code = trim($_POST['tracking_code']);
            $abstract = $this->abstractModel->getAbstractByCode($code);
            
            header('Content-Type: application/json');
            if ($abstract) {
                echo json_encode([
                    'success' => true,
                    'title' => h($abstract->titulo),
                    'status' => h($abstract->estado)
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Código de seguimiento no encontrado.'
                ]);
            }
            exit();
        }
    }
}
