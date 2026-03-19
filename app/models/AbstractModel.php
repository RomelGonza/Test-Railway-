<?php
class AbstractModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Submit Abstract
    public function submit($data) {
        $this->db->query('INSERT INTO abstracts (user_id, titulo, autores, afiliacion, correo, keywords, archivo_pdf, estado, codigo_seguimiento) VALUES(:user_id, :titulo, :autores, :afiliacion, :correo, :keywords, :archivo_pdf, :estado, :codigo_seguimiento)');
        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':titulo', $data['titulo']);
        $this->db->bind(':autores', $data['autores']);
        $this->db->bind(':afiliacion', $data['afiliacion']);
        $this->db->bind(':correo', $data['correo']);
        $this->db->bind(':keywords', $data['keywords']);
        $this->db->bind(':archivo_pdf', $data['archivo_pdf']);
        $this->db->bind(':estado', 'pendiente');
        $this->db->bind(':codigo_seguimiento', $data['codigo_seguimiento']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get Abstracts by User ID
    public function getAbstractsByUserId($user_id) {
        $this->db->query('SELECT * FROM abstracts WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        return $this->db->resultSet();
    }

    // Get All Abstracts (for Admin)
    public function getAllAbstracts() {
        $this->db->query('SELECT * FROM abstracts ORDER BY fecha_envio DESC');
        return $this->db->resultSet();
    }

    // Update Status
    public function updateStatus($id, $estado) {
        $this->db->query('UPDATE abstracts SET estado = :estado WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':estado', $estado);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete abstract
    public function delete($id) {
        $this->db->query('DELETE FROM abstracts WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get Abstract by ID
    public function getAbstractById($id) {
        $this->db->query('SELECT * FROM abstracts WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Update Abstract details
    public function update($data) {
        $this->db->query('UPDATE abstracts SET titulo = :titulo, autores = :autores, afiliacion = :afiliacion, correo = :correo, keywords = :keywords WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':titulo', $data['titulo']);
        $this->db->bind(':autores', $data['autores']);
        $this->db->bind(':afiliacion', $data['afiliacion']);
        $this->db->bind(':correo', $data['correo']);
        $this->db->bind(':keywords', $data['keywords']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get abstract by tracking code
    public function getAbstractByCode($code) {
        $this->db->query('SELECT * FROM abstracts WHERE codigo_seguimiento = :code');
        $this->db->bind(':code', $code);
        return $this->db->single();
    }

    // Check if tracking code is unique
    public function isCodeUnique($code) {
        $this->db->query('SELECT id FROM abstracts WHERE codigo_seguimiento = :code');
        $this->db->bind(':code', $code);
        $this->db->single();
        return $this->db->rowCount() === 0;
    }
}
