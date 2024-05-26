<?php
include_once 'class.database.php';

class Post {
    private $db;
    private $title;
    private $description;
    private $text;
    private $image;
    private $user;

    public function __construct($title = null, $description = null, $text = null, $image = null, $user = null) {
        session_start();
        $this->user = isset($_SESSION['id']) ? $_SESSION['id'] : ''; 
        $this->title = $title;
        $this->description = $description;
        $this->text = $text;
        $this->image = $image;
        
        $this->db = new Database();
        $this->db->connect();
    }

    public function create() {
        $query = 'INSERT INTO posts (title, description, content, image, user_id) VALUES (:title, :description, :content, :image, :user_id)';
        $params = array('title' => $this->title, 'description' => $this->description, 'content' => $this->text, 'image' => $this->image, 'user_id' => $this->user);
        $this->db->execute($query, $params);  
    }

    public function edit($id) {
        $query = 'UPDATE posts SET title = :title, description = :description, content = :content WHERE id = :id';
        $params = array(
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->text,
            'id' => $id
        );
        $this->db->execute($query, $params);  
    }

    public function delete($id) {
        $querycom = 'DELETE FROM comments WHERE post_id = :id';
        $paramscom = array('id' => $id);
        $this->db->execute($querycom, $paramscom);  

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