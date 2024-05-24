<?php
include_once 'class.database.php';

class Comment {
    private $db;
    private $name;
    private $message;

    public function __construct($message = '') {
        session_start();
        $this->name = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
        $this->message = $message;

        $this->db = new Database();
        $this->db->connect();
    }

    public function create() {
        $query = 'INSERT INTO posts (name, message) VALUES (:name, :message)';
        $params = array('name' => $this->name, 'message' => $this->message);
        $this->db->execute($query, $params);  
    }

    public function delete($id) {
        $query = 'delete from comments WHERE id = :id';
        $params = array('id' => $id);
        $this->db->execute($query, $params);    
    }

    public function fetchAll($post_id) {
        $query = 'select * from comments where post_id = :post_id';
        $params = array('post_id' => $post_id);
        $results = $this->db->execute($query, $params);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($id) {
        $query = 'select * from comments WHERE id = :id';
        $params = array('id' => $id);
        $results = $this->db->execute($query, $params);
        return $results->fetch(PDO::FETCH_ASSOC);
    }
}