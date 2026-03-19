<?php
class Inscriptions extends Controller {
    private $inscriptionModel;

    public function __construct() {
        if (!isLoggedIn()) {
            flash('login_needed', 'Por favor inicie sesión para inscribirse', 'alert alert-danger');
            redirect('users/login');
        }
        $this->inscriptionModel = $this->model('Inscription');
    }

    // List inscriptions for current user
    public function index() {
        $inscriptions = $this->inscriptionModel->getInscriptionsByUserId($_SESSION['user_id']);
        $data = [
            'inscriptions' => $inscriptions
        ];
        $this->view('inscriptions/index', $data);
    }

    // Register a new inscription
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'full_name' => trim($_POST['full_name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'country' => trim($_POST['country']),
                'institution' => trim($_POST['institution']),
                'payment_receipt' => '',
                'full_name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'country_err' => '',
                'institution_err' => ''
            ];

            // Validation logic... (simplified for now)
            if (empty($data['full_name'])) $data['full_name_err'] = 'Por favor ingrese su nombre completo';
            if (empty($data['email'])) $data['email_err'] = 'Por favor ingrese su correo';
            if (empty($data['phone'])) $data['phone_err'] = 'Por favor ingrese su teléfono';
            if (empty($data['country'])) $data['country_err'] = 'Por favor ingrese su país';
            if (empty($data['institution'])) $data['institution_err'] = 'Por favor ingrese su institución';

            // Handle file upload (payment receipt)
            if (!empty($_FILES['payment_receipt']['name'])) {
                $file = $_FILES['payment_receipt'];
                $newName = time() . '_' . $file['name'];
                $target = APPROOT . '/../public/img/receipts/' . $newName;

                // Ensure receipts folder exists
                if (!file_exists(APPROOT . '/../public/img/receipts')) {
                    mkdir(APPROOT . '/../public/img/receipts', 0777, true);
                }

                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $data['payment_receipt'] = $newName;
                }
            }

            if (empty($data['full_name_err']) && empty($data['email_err']) && empty($data['phone_err'])) {
                if ($this->inscriptionModel->register($data)) {
                    flash('inscription_success', 'Su inscripción ha sido enviada para validación');
                    redirect('inscriptions/index');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('inscriptions/register', $data);
            }

        } else {
            $data = [
                'full_name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'phone' => '',
                'country' => '',
                'institution' => '',
                'full_name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'country_err' => '',
                'institution_err' => ''
            ];
            $this->view('inscriptions/register', $data);
        }
    }
}
