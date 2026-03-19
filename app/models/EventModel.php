<?php

class EventModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Obtiene el evento activo
     * 
     * @return object|null Objeto del evento si existe uno activo, null si no
     */
    public function getActiveEvent() {
        $this->db->query('SELECT * FROM events WHERE active = 1 LIMIT 1');
        $event = $this->db->single();
        
        return $event ? $event : null;
    }

    /**
     * Obtiene un evento por ID
     * 
     * @param int $id ID del evento
     * @return object|null
     */
    public function getEventById($id) {
        $this->db->query('SELECT * FROM events WHERE id = :id');
        $this->db->bind(':id', $id);
        
        return $this->db->single();
    }

    /**
     * Obtiene todos los eventos
     * 
     * @return array
     */
    public function getAllEvents() {
        $this->db->query('SELECT * FROM events ORDER BY event_date DESC');
        return $this->db->resultSet();
    }

    /**
     * Crea un nuevo evento
     * 
     * @param array $data Array con keys: name, event_date, location
     * @return bool
     */
    public function createEvent($data) {
        $this->db->query('INSERT INTO events (name, event_date, location, active) VALUES(:name, :event_date, :location, 0)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':event_date', $data['event_date']);
        $this->db->bind(':location', $data['location']);
        
        return $this->db->execute();
    }

    /**
     * Activa/desactiva un evento
     * 
     * @param int $id ID del evento
     * @param bool $active True para activar, false para desactivar
     * @return bool
     */
    public function setActive($id, $active = true) {
        $this->db->query('UPDATE events SET active = :active WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':active', $active ? 1 : 0);
        
        return $this->db->execute();
    }
}
?>
