<?php
include_once 'class.database.php';

class User {
    private $db;
    private $username;
    private $password;
    private $role_id;

    public function __construct($username = '', $password = '', $role_id = 0) {
        $this->username = $username;
        $this->password = $password;
        $this->role_id = $role_id;

        $this->db = Database::getConnection();
    }

    public function create() {
        $hashed = password_hash($this->password, PASSWORD_DEFAULT);

        $query = 'INSERT INTO users (username, password, role_id) VALUES (:username, :password, :role_id)';
        $params = array('username' => $this->username, 'password' => $hashed, 'role_id' => $this->role_id);
        $this->db->execute($query, $params);  
    }

    public function delete($id) {
        $query = 'delete from users WHERE id = :id';
        $params = array('id' => $id);
        $this->db->execute($query, $params);    
    }

    public function logIn() {
        $query = 'SELECT * FROM users WHERE username = :username';
        $params = array('username' => $this->username);
        
        $result = $this->db->execute($query, $params);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            header('Location: ../phpblog2/login.php');
            exit();
        }

        if(password_verify($this->password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['id'] = $user['id'];

            header('Location: ../phpblog2/home.php');
            
        } else {
            header('Location: ../phpblog2/login.php');
        }
    }

    public function logOut() {
        session_start();
        $_SESSION = array();
        session_destroy();

        header('Location: ../phpblog2/home.php');
        exit();
    }

    public function fetchAll() {
        $query = 'select * from users';
        $results = $this->db->execute($query, array());
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($id) {
        $query = 'select * from users WHERE id = :id';
        $params = array('id' => $id);
        $results = $this->db->execute($query, $params);
        return $results->fetch(PDO::FETCH_ASSOC);
    }
}