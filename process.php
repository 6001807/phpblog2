<?php
include_once 'classes/class.user.php';
include_once 'classes/class.posts.php';
include_once 'classes/class.comment.php';
include_once 'classes/class.database.php';

$db = Database::getConnection();

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

    if(isset($_POST['newComment'])) {
        $newComment = new Comment($_POST['id'], $_POST['message']);
        $newComment->create();
        header('Location: ../phpblog2/post.php?id=' . $_POST['id']);
    }

    if(isset($_POST['newPost'])) {

        if(isset($_FILES['FileToUpload'])) {
            $dir = 'img/';
            $uploadLoc = $dir . basename($_FILES['FileToUpload']['name']);

            if(file_exists($uploadLoc)) {
                echo 'Image already exists';
            } else {
                move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $uploadLoc);     
            }
        }

        $newPost = new Post($_POST['title'], $_POST['desc'], $_POST['content'], $uploadLoc);
        $newPost->create();
        header('Location: ../phpblog2/admin.php');
    }

    if(isset($_POST['editPost'])) {
        $post = new Post($_POST['title'], $_POST['desc'], $_POST['content']);
        $post->edit($_POST['id']);
        header('Location: ../phpblog2/post.php?id=' . $_POST['id']);
    }

    if(isset($_POST['deletePost'])) {
        $post= new Post();
        $post->delete($_POST['deletePost']);
        header('Location: ../phpblog2/admin.php');
    }

    if(isset($_POST['deleteComment'])) {
        $comm = new Comment();
        $comm->delete($_POST['deleteComment']);
        header('Location: ../phpblog2/post.php?id=' . $_POST['id']);
    }

    if(isset($_POST['deleteUser'])) {
        $user= new User();
        $user->delete($_POST['deleteUser']);
        header('Location: ../phpblog2/admin.php');
    }
}
