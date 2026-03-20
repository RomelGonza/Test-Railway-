<?php

/**
 * API Controller
 * Endpoints JSON para Flutter QR Scanner y autenticación
 */
class Api extends Controller {
    private $userModel;
    private $tokenModel;
    private $attendanceModel;
    private $eventModel;

    public function __construct() {
        // Agregar header CORS para permitir requests desde cualquier origen
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        // Cargar modelos
        $this->userModel = $this->model('User');
        $this->tokenModel = $this->model('AttendanceTokenModel');
        $this->attendanceModel = $this->model('AttendanceModel');
        $this->eventModel = $this->model('EventModel');
    }

    /**
     * Envía respuesta JSON y termina la ejecución
     * 
     * @param array|object $data Datos a enviar
     * @param int $status Código HTTP (default 200)
     */
    private function json($data, $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    }

    /**
     * Verifica Bearer token en header Authorization
     * Retorna objeto usuario autenticado o envía error 401
     * 
     * @return object Usuario autenticado
     */
    private function authBearer() {
        // Obtener headers (compatible con varios servidores)
        $headers = getallheaders();
        if (empty($headers)) {
            // Fallback si getallheaders() no funciona
            $headers = [];
            foreach ($_SERVER as $key => $value) {
                if (strpos($key, 'HTTP_') === 0) {
                    $header = str_replace('HTTP_', '', $key);
                    $header = str_replace('_', '-', $header);
                    $headers[strtolower($header)] = $value;
                }
            }
        }

        // Buscar Authorization header (case-insensitive)
        $auth = '';
        foreach ($headers as $key => $value) {
            if (strtolower($key) === 'authorization') {
                $auth = $value;
                break;
            }
        }

        if (empty($auth) || !str_starts_with($auth, 'Bearer ')) {
            $this->json(['status' => 'unauthorized'], 401);
        }

        // Extraer token
        $token = substr($auth, 7);
        
        // Buscar usuario
        $user = $this->userModel->findByApiToken($token);
        if (!$user) {
            $this->json(['status' => 'unauthorized'], 401);
        }

        return $user;
    }

    /**
     * POST /api/token
     * Login y generación de API token (Bearer) para la APK
     * 
     * Parámetros (JSON o form-data):
     *   - email: string
     *   - password: string
     * 
     * Respuestas:
     *   - 200: {"status":"ok","api_token":"...","name":"..."}
     *   - 401: {"status":"invalid_credentials"}
     */
    public function token() {
        // Leer body (JSON o form-data)
        $input = json_decode(file_get_contents('php://input'), true);
        if (!is_array($input)) {
            $input = $_POST;
        }

        $email = $input['email'] ?? null;
        $password = $input['password'] ?? null;

        if (empty($email) || empty($password)) {
            $this->json(['status' => 'invalid_credentials'], 401);
        }

        // Verificar credenciales (método de login existente en User model)
        $user = $this->userModel->login($email, $password);
        
        if (!$user) {
            $this->json(['status' => 'invalid_credentials'], 401);
        }

        // Generar nuevo API token (32 bytes = 64 chars hex)
        $api_token = bin2hex(random_bytes(32));

        // Guardar token en BD
        $saved = $this->userModel->saveApiToken($user->id, $api_token);
        
        if (!$saved) {
            $this->json(['status' => 'error', 'message' => 'Could not save token'], 500);
        }

        // Responder con éxito
        $this->json([
            'status' => 'ok',
            'api_token' => $api_token,
            'name' => $user->name,
            'user_id' => $user->id
        ], 200);
    }

    /**
     * POST /api/scan
     * Escanea un QR (registra asistencia)
     * Solo para usuarios con role = 'scanner'
     * 
     * Header requerido:
     *   - Authorization: Bearer {api_token}
     * 
     * Body (JSON):
     *   - token: string (token del QR)
     * 
     * Respuestas:
     *   - 200: {"status":"ok","user":{"id":...,"name":"..."}}
     *   - 401: {"status":"unauthorized"} o {"status":"invalid_token"}
     *   - 409: {"status":"already_registered","scanned_at":"..."}
     *   - 422: {"status":"expired_token"}
     */
    public function scan() {
        // Verificar autenticación Bearer
        $headers = getallheaders();
        $auth = '';
        foreach ($headers as $key => $value) {
            if (strtolower($key) === 'authorization') {
                $auth = $value;
                break;
            }
        }

        // PERMITIR TOKEN DE PRUEBA TEMPORALMENTE
        if ($auth === 'Bearer TOKEN_DEL_ORGANIZADOR') {
            $user = (object)['id' => 1, 'role' => 'scanner']; // Usuario simulado
        } else {
            $user = $this->authBearer();
            
            // Si el rol en BD no es admin o scanner, rechazar
            if (empty($user->role) || ($user->role !== 'admin' && $user->role !== 'scanner')) {
                $this->json(['status' => 'forbidden', 'message' => 'Only scanners can use this endpoint'], 403);
            }
        }

        // Leer body JSON
        $input = json_decode(file_get_contents('php://input'), true);
        $qr_token = $input['token'] ?? null;

        if (empty($qr_token)) {
            $this->json(['status' => 'invalid_request', 'message' => 'token field required'], 400);
        }

        // Validar token QR
        $validation = $this->tokenModel->validate($qr_token);

        // Manejo de resultados de validación
        if (is_string($validation)) {
            // Retornó string de error
            if ($validation === 'invalid_token') {
                $this->json(['status' => 'invalid_token'], 401);
            } elseif ($validation === 'expired_token') {
                $this->json(['status' => 'expired_token'], 422);
            } elseif ($validation === 'already_registered') {
                // Obtener el registro del token para saber de qué usuario se trata
                $token_obj = $this->tokenModel->findByToken($qr_token);
                $user_id = $token_obj ? $token_obj->user_id : null;
                $event_id = $token_obj ? $token_obj->event_id : null;

                // Obtener timestamp de asistencia previa
                $attendance = $this->attendanceModel->getByUserAndEvent($user_id, $event_id);
                $scanned_at = $attendance ? $attendance->scanned_at : '';
                
                $this->json([
                    'status' => 'already_registered',
                    'scanned_at' => $scanned_at
                ], 409);
            }
        }

        // Token válido - es un objeto con user_id, event_id, token
        $user_id = $validation->user_id;
        $event_id = $validation->event_id;

        // Registrar asistencia
        $registered = $this->attendanceModel->register($user_id, $event_id, $qr_token, $user->id);

        if (!$registered) {
            $this->json(['status' => 'error', 'message' => 'Could not register attendance'], 500);
        }

        // Obtener datos del usuario que asiste
        $attended_user = $this->userModel->getUserById($user_id);

        // Responder con éxito
        $this->json([
            'status' => 'ok',
            'user' => [
                'id' => $attended_user->id,
                'name' => $attended_user->name
            ]
        ], 200);
    }

    /**
     * GET /api/qr
     * Obtiene imagen PNG del QR del usuario autenticado
     * 
     * Autenticación:
     *   - Sesión web (isLoggedIn()) O
     *   - Bearer token en header Authorization: Bearer {api_token}
     * 
     * Respuesta:
     *   - 200: imagen PNG (Content-Type: image/png)
     *   - 401: {"status":"unauthorized"}
     */
    public function qr() {
        $user = null;

        // Intentar autenticarse por sesión web
        if (isLoggedIn()) {
            $user_id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($user_id);
        }

        // Si no hay sesión, intentar con Bearer token
        if (!$user) {
            $headers = getallheaders();
            if (empty($headers)) {
                // Fallback
                $headers = [];
                foreach ($_SERVER as $key => $value) {
                    if (strpos($key, 'HTTP_') === 0) {
                        $header = str_replace('HTTP_', '', $key);
                        $header = str_replace('_', '-', $header);
                        $headers[strtolower($header)] = $value;
                    }
                }
            }

            // Buscar Authorization header
            $auth = '';
            foreach ($headers as $key => $value) {
                if (strtolower($key) === 'authorization') {
                    $auth = $value;
                    break;
                }
            }

            if (!empty($auth) && str_starts_with($auth, 'Bearer ')) {
                $token = substr($auth, 7);
                $user = $this->userModel->findByApiToken($token);
            }
        }

        // Si no se pudo autenticar, retornar error
        if (!$user) {
            $this->json(['status' => 'unauthorized'], 401);
        }

        // Obtener evento activo
        $event = $this->eventModel->getActiveEvent();
        if (!$event) {
            $this->json(['status' => 'error', 'message' => 'No active event'], 500);
        }

        // Obtener token existente o generar uno
        $token_obj = $this->tokenModel->getByUserId($user->id, $event->id);
        
        if (!$token_obj) {
            // Generar nuevo token
            $token_string = $this->tokenModel->generateForUser($user->id, $event->id);
            if (!$token_string) {
                $this->json(['status' => 'error', 'message' => 'Could not generate token'], 500);
            }
        } else {
            // Usar token existente
            $token_string = $token_obj->token;
        }

        // Generar QR en PNG
        $png_bytes = generate_qr_png($token_string);
        
        if ($png_bytes === false) {
            $this->json(['status' => 'error', 'message' => 'Could not generate QR code'], 500);
        }

        // Limpiar cualquier salida (texto, espacios, errores, notices) que se haya generado antes
        // Esto es súper importante porque un solo "espacio" o "Warning" corromperá los bytes de la imagen
        while (ob_get_level()) {
            ob_end_clean();
        }

        // Enviar imagen PNG pura
        header('Content-Type: image/png');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        echo $png_bytes;
        exit;
    }
}

?>
