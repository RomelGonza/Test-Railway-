<?php
class Committee {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getMembers() {
        $this->db->query("SELECT * FROM committee ORDER BY display_order ASC");
        return $this->db->resultSet();
    }

    public function addMember($data) {
        $this->db->query("INSERT INTO committee (name, institution, role, image_url, display_order) 
                          VALUES (:name, :institution, :role, :image_url, :display_order)");
        
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':institution', $data['institution']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':display_order', $data['display_order']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
