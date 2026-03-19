<?php

class AttendanceTokenModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Genera un token SHA256 único para usuario + evento
     * Si ya existe uno para ese usuario-evento, lo reemplaza
     * 
     * @param int $user_id ID del usuario
     * @param int $event_id ID del evento
     * @return string El token generado (64 chars hex)
     */
    public function generateForUser($user_id, $event_id) {
        // Generar token SHA256 único usando user_id + event_id + QR_SECRET + timestamp
        $raw = $user_id . '|' . $event_id . '|' . QR_SECRET . '|' . time();
        $token = hash('sha256', $raw);
        
        // Calcular fecha de expiración
        $expires_at = date('Y-m-d H:i:s', strtotime('+' . QR_EXPIRES_HOURS . ' hours'));
        
        // INSERT ... ON DUPLICATE KEY UPDATE para atomicidad
        // Si user_id+event_id ya existe, reemplaza el token y expires_at
        $this->db->query('INSERT INTO attendance_tokens (user_id, event_id, token, expires_at)
                        VALUES(:user_id, :event_id, :token, :expires_at)
                        ON DUPLICATE KEY UPDATE
                            token = :token,
                            expires_at = :expires_at,
                            created_at = CURRENT_TIMESTAMP');
        
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':event_id', $event_id);
        $this->db->bind(':token', $token);
        $this->db->bind(':expires_at', $expires_at);
        
        if ($this->db->execute()) {
            return $token;
        } else {
            return false;
        }
    }

    /**
     * Obtiene el token para usuario + evento
     * 
     * @param int $user_id ID del usuario
     * @param int $event_id ID del evento
     * @return object|null Objeto con: id, user_id, event_id, token, expires_at, created_at
     */
    public function getByUserId($user_id, $event_id) {
        $this->db->query('SELECT * FROM attendance_tokens WHERE user_id = :user_id AND event_id = :event_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':event_id', $event_id);
        
        return $this->db->single();
    }

    /**
     * Busca un token por su valor
     * 
     * @param string $token Valor del token (64 chars hex)
     * @return object|null
     */
    public function findByToken($token) {
        $this->db->query('SELECT * FROM attendance_tokens WHERE token = :token');
        $this->db->bind(':token', $token);
        
        return $this->db->single();
    }

    /**
     * Valida un token QR
     * 
     * Pasos:
     * 1. Buscar token en attendance_tokens → si no existe: 'invalid_token'
     * 2. Verificar expires_at > NOW() → si expiró: 'expired_token'
     * 3. Buscar en attendance (user_id+event_id) → si existe: 'already_registered'
     * 4. Todo OK → retornar objeto con user_id, event_id, token
     * 
     * @param string $token Valor del token a validar
     * @return object|string Objeto {user_id, event_id, token} o string de error
     */
    public function validate($token) {
        // Paso 1: Buscar el token
        $token_row = $this->findByToken($token);
        if (!$token_row) {
            return 'invalid_token';
        }

        // Paso 2: Verificar si expiró
        $now = new DateTime();
        $expires = new DateTime($token_row->expires_at);
        if ($now > $expires) {
            return 'expired_token';
        }

        // Paso 3: Verificar si ya está registrado
        $this->db->query('SELECT id FROM attendance WHERE user_id = :user_id AND event_id = :event_id');
        $this->db->bind(':user_id', $token_row->user_id);
        $this->db->bind(':event_id', $token_row->event_id);
        
        if ($this->db->rowCount() > 0 || $this->db->single() !== false) {
            return 'already_registered';
        }

        // Paso 4: Todo OK, retornar objeto
        return (object) [
            'user_id' => $token_row->user_id,
            'event_id' => $token_row->event_id,
            'token' => $token_row->token
        ];
    }

    /**
     * Obtiene todos los tokens de un evento
     * 
     * @param int $event_id ID del evento
     * @return array Array de objetos
     */
    public function getByEvent($event_id) {
        $this->db->query('SELECT * FROM attendance_tokens WHERE event_id = :event_id ORDER BY created_at DESC');
        $this->db->bind(':event_id', $event_id);
        
        return $this->db->resultSet();
    }

    /**
     * Elimina un token (útil para invalidarlo manualmente)
     * 
     * @param int $id ID del registro de token
     * @return bool
     */
    public function deleteToken($id) {
        $this->db->query('DELETE FROM attendance_tokens WHERE id = :id');
        $this->db->bind(':id', $id);
        
        return $this->db->execute();
    }
}
?>
