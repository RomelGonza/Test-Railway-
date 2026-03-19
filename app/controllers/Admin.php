<?php
class Admin extends Controller {
    public function __construct() {
        if (!isLoggedIn() || $_SESSION['user_role'] != 'admin') {
            redirect('users/login');
        }
        $this->inscriptionModel = $this->model('Inscription');
        $this->abstractModel = $this->model('AbstractModel');
    }

    public function index() {
        $inscriptionsCount = count($this->inscriptionModel->getAllInscriptions());
        $abstractsCount = count($this->abstractModel->getAllAbstracts());

        $data = [
            'inscriptions_count' => $inscriptionsCount,
            'abstracts_count' => $abstractsCount
        ];

        $this->view('admin/index', $data);
    }

    public function inscriptions() {
        $inscriptions = $this->inscriptionModel->getAllInscriptions();
        $data = [
            'inscriptions' => $inscriptions
        ];
        $this->view('admin/inscriptions', $data);
    }

    public function abstracts() {
        $abstracts = $this->abstractModel->getAllAbstracts();
        $data = [
            'abstracts' => $abstracts
        ];
        $this->view('admin/abstracts', $data);
    }
}
