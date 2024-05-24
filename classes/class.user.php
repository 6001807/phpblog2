<?php
include_once 'class.database.php';

class User {
    private $db;
    private $username;
    private $password;
    private $role_id;

    public function __construct($username, $password, $role_id = 0) {
        $this->username = $username;
        $this->password = $password;
        $this->role_id = $role_id;

        $this->db = new Database();
        $this->db->connect();
    }

    public function create() {
        $hashed = password_hash($this->password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO users (username, password, role_id) VALUES (:username, :password, :role_id)';
        $params = array('username' => $this->username, 'password' => $hashed, 'role_id' => $this->role_id);
        $this->db->execute($query, $params);  
    }

    public function delete() {

    }

    public function logIn() {
        $query = 'SELECT * FROM users WHERE username = :username';
        $params = array('username' => $this->username);
        
        $result = $this->db->execute($query, $params);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            header('Location: ../phpblog2/notAllowed.php');
            exit();
        }

        if(password_verify($this->password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['role_id'] = $this->username;

            header('Location: ../phpblog2/home.php');
        } else {
            header('Location: ../phpblog2/notAllowed.php');
            exit();
        }
    }
}