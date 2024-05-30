<?php
include_once 'class.database.php';

class Comment {
    private $db;
    private $post_id;
    private $name;
    private $message;

    public function __construct($post_id = 0, $message = '') {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->post_id = $post_id;
        $this->name = isset($_SESSION['username']) ? $_SESSION['username'] : ''; 
        $this->message = $message;

        $this->db = Database::getConnection();
    }

    public function create() {
        $query = 'INSERT INTO comments (post_id, name, message) VALUES (:post_id, :name, :message)';
        $params = array('post_id' => $this->post_id, 'name' => $this->name, 'message' => $this->message);
        $this->db->execute($query, $params);  
    }

    public function delete($id) {
        $query = 'delete from comments WHERE id = :id';
        $params = array('id' => $id);
        $this->db->execute($query, $params);    
    }

    public function fetchAll($post_id, $direction) {
        $query = 'select * from comments where post_id = :post_id ORDER BY created_on ' . $direction;
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