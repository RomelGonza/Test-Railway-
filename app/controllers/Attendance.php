<?php

/**
 * Attendance Controller
 * Interfaz web para ver QR personal y panel de admin
 */
class Attendance extends Controller {
    private $tokenModel;
    private $attendanceModel;
    private $eventModel;
    private $userModel;

    public function __construct() {
        $this->tokenModel = $this->model('AttendanceTokenModel');
        $this->attendanceModel = $this->model('AttendanceModel');
        $this->eventModel = $this->model('EventModel');
        $this->userModel = $this->model('User');
    }

    /**
     * GET /attendance/qr
     * Muestra tarjeta con QR personal del usuario
     * Requiere sesión web activa (isLoggedIn())
     * 
     * Datos pasados a vista:
     *   - event: objeto del evento activo
     *   - token: token QR del usuario para este evento
     *   - has_attended: boolean si ya fue escaneado
     */
    public function qr() {
        // Verificar autenticación
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $user_id = $_SESSION['user_id'];

        // Obtener evento activo
        $event = $this->eventModel->getActiveEvent();
        if (!$event) {
            // No hay evento activo, pasar null a la vista
            $data = [
                'event' => null,
                'token' => null,
                'has_attended' => false
            ];
            $this->view('attendance/qr', $data);
            return;
        }

        // Obtener o generar token QR
        $token_obj = $this->tokenModel->getByUserId($user_id, $event->id);
        
        if (!$token_obj) {
            // Generar nuevo token
            $token_string = $this->tokenModel->generateForUser($user_id, $event->id);
        } else {
            $token_string = $token_obj->token;
        }

        // Verificar si ya fue escaneado
        $has_attended = $this->attendanceModel->hasAttendance($user_id, $event->id);

        // Pasar datos a la vista
        $data = [
            'event' => $event,
            'token' => $token_string,
            'has_attended' => $has_attended
        ];

        $this->view('attendance/qr', $data);
    }

    /**
     * GET /attendance/list
     * Panel administrativo: lista de asistentes
     * Requiere sesión web y role admin
     * 
     * Datos pasados a vista:
     *   - event: objeto del evento activo
     *   - attendances: array de objetos con registros de asistencia (JOIN con users)
     */
    public function list() {
        // Verificar autenticación
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $user_id = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($user_id);

        // Verificar permisos (solo admin)
        if (empty($user->role) || $user->role !== 'admin') {
            redirect('pages/index');
        }

        // Obtener evento activo
        $event = $this->eventModel->getActiveEvent();
        if (!$event) {
            $data = [
                'event' => null,
                'attendances' => []
            ];
            $this->view('attendance/list', $data);
            return;
        }

        // Obtener lista de asistencias con JOIN a usuarios
        $attendances = $this->attendanceModel->getByEvent($event->id);

        // Pasar datos a la vista
        $data = [
            'event' => $event,
            'attendances' => $attendances
        ];

        $this->view('attendance/list', $data);
    }
}

?>
