<?php
include_once 'class.database.php';

class Post {
    private $db;
    private $title;
    private $description;
    private $text;

    public function __construct($title, $description, $text) {
        $this->title = $title;
        $this->description = $description;
        $this->text = $text;
        
        $this->db = new Database();
        $this->db->connect();
    }
}