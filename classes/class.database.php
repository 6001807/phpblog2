<?php
class Database {
    protected $conn;
    private $host = 'localhost';
    private $dbName = 'phpblog';
    private $user = 'root';
    private $pass = '';

    public function connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function execute($query, $params) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


