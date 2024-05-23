<?php
require_once('class.database.php');

class User extends Database {
   
    public $username;
    public $password;

    public function __construct($username, $password) {
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