<?php
include_once 'class.database.php';

class User {
    private $db;
    public $username;
    public $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;

        $this->db = new Database();
        $this->db->connect();
    }

    public function create() {
        $hashed = password_hash($this->password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO users (username, password) VALUES (:username, :password)';
        $params = array('username' => $this->username, 'password' => $hashed);
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

            header('Location: ../phpblog2/home.php');
        } else {
            header('Location: ../phpblog2/notAllowed.php');
            exit();
        }
    }
}