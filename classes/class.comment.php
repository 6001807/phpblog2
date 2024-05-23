<?php
include_once 'class.database.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
}