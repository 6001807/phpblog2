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
    $post = new Post();
    $allPosts = $post->fetchAll("DESC");
    session_start();
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
    <section id='post-list'>
        <?php foreach($allPosts as $post) { ?>
            <section class="post-item">
                <h2><?php echo $post['title']; ?></h2>
                <p><?php echo $post['description']; ?></p>
                <p><?php echo $post['content']; ?></p>
                <section class='linkto'>
                    <p><a href="post.php?<?php echo 'id=' . $post['id'] ?>">Link to post</a></p>
                </section>
            </section>
        <?php } ?>
    </section>
</body>
</html>