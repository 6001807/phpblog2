<?php
include_once 'class.database.php';

class Comment {
    private $db;
    private $name;
    private $message;

    public function __construct($name, $message) {
        $this->name = $name;
        $this->message = $message;
        
        $this->db = new Database();
        $this->db->connect();
    }
}