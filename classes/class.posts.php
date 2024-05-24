<?php
include_once 'class.database.php';

class Post {
    private $db;
    private $title;
    private $description;
    private $text;

    public function __construct($title = null, $description = null, $text = null) {
        $this->title = $title;
        $this->description = $description;
        $this->text = $text;
        
        $this->db = new Database();
        $this->db->connect();
    }

    public function create() {
        $query = 'INSERT INTO posts (title, description, content) VALUES (:title, :description, :content)';
        $params = array('title' => $this->title, 'description' => $this->description, 'content' => $this->text);
        $this->db->execute($query, $params);  
    }

    public function delete($id) {
        $query = 'delete from posts WHERE id = :id';
        $params = array('id' => $id);
        $this->db->execute($query, $params);    
    }

    public function fetchAll($direction) {
        $query = 'SELECT * FROM posts ORDER BY created_on ' . $direction;
        $results = $this->db->execute($query, array());
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($id) {
        $query = 'select * from posts WHERE id = :id';
        $params = array('id' => $id);
        $results = $this->db->execute($query, $params);
        return $results->fetch(PDO::FETCH_ASSOC);
    }
}