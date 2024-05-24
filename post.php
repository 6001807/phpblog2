<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='./style.css'>
</head>
<?php
    include_once 'classes/class.posts.php';
    include_once 'classes/class.comment.php';

    $post = new Post();
    $post = $post->fetchOne($_GET['id']);
    
    $comments = new Comment();
    $comments = $comments->fetchAll($_GET['id']);
?>
<body>
    <header>
        <section id='logo'>
            <a href="home.php"><img src="image.png" alt=""></a>
        </section>
        <section id='links'>
            <?php if(isset($_SESSION['role_id'])) { ?>
                <?php if($_SESSION['role_id'] == 1) { ?>
                    <section class='link'>
                        <p style='padding: 0; margin: 0;'><a href="../phpblog2/admin.php">Admin</a></p>
                    </section>
                <?php } ?>
                <form method="post" action="process.php"> 
                    <button type="submit" class='login' name="logout">Logout</button>
                </form>
            <?php } else { ?>
                <section class='link'>
                        <p><a href="login.php"><button type="submit" class='login'>Login</button></a></p>
                </section>
            <?php } ?>
        </section>
    </header>
    <section id='content'>
        <section class="post-item">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo $post['description']; ?></p>
            <p><?php echo $post['content']; ?></p>
        </section>  
        <section id='comments'>
            <h1>Comments</h1>
            <?php foreach($comments as $comment) { ?>
                <section class='comment'>
                    <p style='font-weight: bold;'><?php echo $comment['name']; ?></p>
                    <p><?php echo $comment['message']; ?></p>
                </section>
            <?php } ?>
        </section>
    </section>
</body>
</html>