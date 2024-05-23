<?php
include_once 'classes/class.user.php';
include_once 'classes/class.database.php';

$db = new Database();
$db->connect();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['addUser'])) {
        $user = new User($_POST['username'], $_POST['password']);
    }

    if(isset($_POST['login'])) {
        $user = new User($_POST['username'], $_POST['password']);
        $user->logIn();
    }
}
