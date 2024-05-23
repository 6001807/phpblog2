<?php
require_once('class.database.php');

class User extends Database {
   
    public $name;
    public $password;

    public function __construct($conn, $username, $password) {
        parent::__construct($conn);
        $this->username = $username;
        $this->password = $password;
    }

    public function create($name, $password) {
          
    }

    public function delete() {

    }

    public function logIn() {

    }
}