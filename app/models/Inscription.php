<?php
class Inscription {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Register Inscription
    public function register($data) {
        $this->db->query('INSERT INTO inscriptions (user_id, full_name, email, phone, country, institution, payment_receipt) VALUES(:user_id, :full_name, :email, :phone, :country, :institution, :payment_receipt)');
        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':institution', $data['institution']);
        $this->db->bind(':payment_receipt', $data['payment_receipt']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get Inscriptions by User ID
    public function getInscriptionsByUserId($user_id) {
        $this->db->query('SELECT * FROM inscriptions WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        return $this->db->resultSet();
    }

    // Get All Inscriptions (for Admin)
    public function getAllInscriptions() {
        $this->db->query('SELECT * FROM inscriptions ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    // Update Status
    public function updateStatus($id, $status) {
        $this->db->query('UPDATE inscriptions SET payment_status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete inscription
    public function delete($id) {
        $this->db->query('DELETE FROM inscriptions WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
