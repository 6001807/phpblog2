<?php
include_once 'classes/class.user.php';
include_once 'classes/class.posts.php';
include_once 'classes/class.database.php';

$db = new Database();
$db->connect();
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['login'])) {
        $user = new User($_POST['username'], $_POST['password']);
        $user->logIn();
    }

    if(isset($_POST['logout'])) {
        $user = new User($_POST['username'], $_POST['password']);
        $user->logOut();
    }

    if(isset($_POST['newUser'])) {
        $newUser = new User($_POST['username'], $_POST['password'], $_POST['role_id']);
        $newUser->create();
        header('Location: ../phpblog2/admin.php');
    }

    if(isset($_POST['newPost'])) {
        $newPost = new Post($_POST['title'], $_POST['desc'], $_POST['content']);
        $newPost->create();
        header('Location: ../phpblog2/admin.php');
    }
}
