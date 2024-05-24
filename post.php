<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include_once 'classes/class.posts.php';
    $post = new Post();
    $post = $post->fetchOne($_GET['id']);
?>
<body>
    <section class='link'>
        <p><a href="../phpblog2/home.php">Back to home</a></p>
    </section>
    <section class="post-item">
        <h2><?php echo $post['title']; ?></h2>
        <p><?php echo $post['description']; ?></p>
        <p><?php echo $post['content']; ?></p>
    </section>  
</body>
</html>