<?php
class Database {
    public static $instance = null;
    protected $conn;
    private $host = 'localhost';
    private $dbName = 'phpblog';

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getConnection() {
        if(self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function execute($query, $params = array()) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


