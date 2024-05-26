<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='./st.css'>
</head>
<?php
    include_once 'classes/class.posts.php';
    include_once 'classes/class.comment.php';

    $post = new Post();
    $post = $post->fetchOne($_GET['id']);
    
    $comments = new Comment();
    $comments = $comments->fetchAll($_GET['id'], "DESC");
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
        <section class="postitem">
            <h2><?php echo $post['title']; ?></h2>
            <img style='width: 400px;'src="<?php echo $post['image']; ?>" alt="">
            <p><?php echo $post['description']; ?></p>
            <p><?php echo $post['content']; ?></p>
        </section>  
        <section id='comments'>
            <h1><?php echo count($comments) ?> Comments</h1>
            <?php if(isset($_SESSION['role_id'])) { ?>
                <form action="process.php" method="POST">
                    <input type="hidden" name='id' id='id' value='<?php echo $_GET['id'] ?>'>
                    <textarea type="text" name='message' placeholder="Write a comment" required></textarea>
                    <input type="submit" name='newComment' value="Submit">
                </form>
            <?php } ?>
            <?php foreach($comments as $comment) { ?>
                <section class='comment'>
                    <?php
                        $dateTimeObject = new DateTime($comment['created_on']);
                        $date = $dateTimeObject->format('d-m-Y H:i');
                    ?>
                    <section style='display: flex; gap: 5px; align-items: center;'>
                        <p style='font-weight: bold;'><?php echo $comment['name']; ?></p>
                        <p style='font-size: 14px; font-style: italic;'><?php echo $date ?></p>
                        <form method="post" action="process.php">
                            <input type="hidden" name='id' id='id' value='<?php echo $_GET['id'] ?>'>
                            <?php if(isset($_SESSION['role_id'])) { ?>
                                <?php if($_SESSION['role_id'] == 1) { ?>
                                    <button type="submit" value='<?php echo $comment['id']; ?>' class='logine' name="deleteComment">Delete</button>
                                <?php } ?>
                            <?php } ?>
                        </form>
                    </section>
                    <p><?php echo $comment['message']; ?></p>
                </section>
            <?php } ?>
        </section>
    </section>
</body>
</html>