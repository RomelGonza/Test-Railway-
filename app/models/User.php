<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Register user
    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password, user_category, dni, university, professional_school, phone, department) VALUES(:name, :email, :password, :user_category, :dni, :university, :professional_school, :phone, :department)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':user_category', $data['user_category']);
        $this->db->bind(':dni', $data['dni']);
        $this->db->bind(':university', $data['university']);
        $this->db->bind(':professional_school', $data['professional_school']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':department', $data['department']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($row) {
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by DNI or Email and return object
    public function findUserByDniOrEmail($query) {
        $this->db->query('SELECT * FROM users WHERE email = :query OR dni = :query LIMIT 1');
        $this->db->bind(':query', $query);

        return $this->db->single();
    }

    // Get User by ID
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Update User Profile
    public function updateProfile($data) {
        $this->db->query('UPDATE users SET name = :name, phone = :phone, university = :university, professional_school = :professional_school, department = :department WHERE id = :id');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':university', $data['university']);
        $this->db->bind(':professional_school', $data['professional_school']);
        $this->db->bind(':department', $data['department']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get all users
    public function getAllUsers() {
        $this->db->query('SELECT * FROM users ORDER BY id DESC');
        return $this->db->resultSet();
    }

    // Delete user
    public function deleteUser($id) {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update User by Admin (Full Edit)
    public function updateByAdmin($data) {
        if(!empty($data['password'])){
            $this->db->query('UPDATE users SET name = :name, email = :email, user_category = :user_category, dni = :dni, university = :university, professional_school = :professional_school, phone = :phone, department = :department, password = :password WHERE id = :id');
            $this->db->bind(':password', $data['password']);
        } else {
            $this->db->query('UPDATE users SET name = :name, email = :email, user_category = :user_category, dni = :dni, university = :university, professional_school = :professional_school, phone = :phone, department = :department WHERE id = :id');
        }
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':user_category', $data['user_category']);
        $this->db->bind(':dni', $data['dni']);
        $this->db->bind(':university', $data['university']);
        $this->db->bind(':professional_school', $data['professional_school']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':department', $data['department']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by API token (para autenticación de APK)
    public function findByApiToken($token) {
        $this->db->query('SELECT * FROM users WHERE api_token = :api_token');
        $this->db->bind(':api_token', $token);

        return $this->db->single();
    }

    // Save API token for user (para autenticación de APK)
    public function saveApiToken($user_id, $token) {
        $this->db->query('UPDATE users SET api_token = :api_token WHERE id = :id');
        $this->db->bind(':id', $user_id);
        $this->db->bind(':api_token', $token);

        return $this->db->execute();
    }
}
