<?php

class AttendanceModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Registra la asistencia de un usuario a un evento
     * Usa INSERT IGNORE para respetar el UNIQUE constraint
     * 
     * @param int $user_id ID del usuario
     * @param int $event_id ID del evento
     * @param string $token Token QR utilizado
     * @param int|null $scanner_id ID del usuario que escanea (scanner)
     * @return bool
     */
    public function register($user_id, $event_id, $token, $scanner_id = null) {
        // Obtenemos la fecha actual de PHP (que ya está en America/Lima gracias a config.php)
        $now = date('Y-m-d H:i:s');
        
        $this->db->query('INSERT IGNORE INTO attendance (user_id, event_id, token_used, scanner_id, scanned_at)
                        VALUES(:user_id, :event_id, :token_used, :scanner_id, :scanned_at)');
        
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':event_id', $event_id);
        $this->db->bind(':token_used', $token);
        $this->db->bind(':scanner_id', $scanner_id);
        $this->db->bind(':scanned_at', $now);
        
        return $this->db->execute();
    }

    /**
     * Obtiene todos los registros de asistencia de un evento
     * 
     * @param int $event_id ID del evento
     * @return array Array de objetos con: id, user_id, event_id, token_used, scanned_at, scanner_id
     */
    public function getByEvent($event_id) {
        $this->db->query('SELECT a.*, u.name, u.email 
                        FROM attendance a
                        JOIN users u ON a.user_id = u.id
                        WHERE a.event_id = :event_id
                        ORDER BY a.scanned_at DESC');
        $this->db->bind(':event_id', $event_id);
        
        return $this->db->resultSet();
    }

    /**
     * Obtiene los registros de asistencia de un usuario en un evento
     * 
     * @param int $user_id ID del usuario
     * @param int $event_id ID del evento
     * @return object|null
     */
    public function getByUserAndEvent($user_id, $event_id) {
        $this->db->query('SELECT * FROM attendance WHERE user_id = :user_id AND event_id = :event_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':event_id', $event_id);
        
        return $this->db->single();
    }

    /**
     * Verifica si un usuario ya registró asistencia en un evento
     * 
     * @param int $user_id ID del usuario
     * @param int $event_id ID del evento
     * @return bool
     */
    public function hasAttendance($user_id, $event_id) {
        $this->db->query('SELECT id FROM attendance WHERE user_id = :user_id AND event_id = :event_id LIMIT 1');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':event_id', $event_id);
        
        $result = $this->db->single();
        return $result !== false && $result !== null;
    }

    /**
     * Obtiene estadísticas de asistencia por evento
     * 
     * @param int $event_id ID del evento
     * @return object|null Con: total_registered, total_attended, attended
     */
    public function getAttendanceStats($event_id) {
        $this->db->query('SELECT COUNT(DISTINCT a.user_id) as attended FROM attendance a WHERE a.event_id = :event_id');
        $this->db->bind(':event_id', $event_id);
        $stats = $this->db->single();
        
        return $stats ? $stats : (object) ['attended' => 0];
    }

    /**
     * Obtiene la lista de usuarios que NO asistieron (comparado con tokens generados)
     * 
     * @param int $event_id ID del evento
     * @return array
     */
    public function getAbsentees($event_id) {
        $this->db->query('SELECT DISTINCT u.* 
                        FROM attendance_tokens at
                        JOIN users u ON at.user_id = u.id
                        WHERE at.event_id = :event_id
                        AND NOT EXISTS (
                            SELECT 1 FROM attendance a 
                            WHERE a.user_id = u.id AND a.event_id = :event_id
                        )');
        $this->db->bind(':event_id', $event_id);
        
        return $this->db->resultSet();
    }

    /**
     * Obtiene todos los registros de asistencia de un usuario en todos los eventos
     * 
     * @param int $user_id ID del usuario
     * @return array
     */
    public function getByUser($user_id) {
        $this->db->query('SELECT a.*, e.name as event_name, e.event_date
                        FROM attendance a
                        JOIN events e ON a.event_id = e.id
                        WHERE a.user_id = :user_id
                        ORDER BY a.scanned_at DESC');
        $this->db->bind(':user_id', $user_id);
        
        return $this->db->resultSet();
    }

    /**
     * Elimina un registro de asistencia
     * 
     * @param int $id ID del registro de asistencia
     * @return bool
     */
    public function deleteAttendance($id) {
        $this->db->query('DELETE FROM attendance WHERE id = :id');
        $this->db->bind(':id', $id);
        
        return $this->db->execute();
    }
}
?>
