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

    $post = new Post();
    $post = $post->fetchOne($_GET['id']);

    if($_SESSION['role_id'] == 1) {
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
        <form method='POST' action="process.php" enctype="multipart/form-data">
            <h2>Edit post</h2>
            <img style='width: 400px;'src="<?php echo $post['image']; ?>" alt="">
            <section class="credentials">
                <input type="hidden" name='id' id='id' value='<?php echo $post['id']; ?>'> 
                <label for="title">Title:</label>
                <input type="text" name='title' id='title' value='<?php echo $post['title']; ?>' required> 
            </section>
            
            <section class="credentials">
                <label for="desc">Description:</label>
                <input type="text" name='desc' value='<?php echo $post['description']; ?>' id='desc' required>
            </section>
            
            <section class="credential" style='display: flex; flex-direction: column;'>
                <label for="content" >Content:</label>
                <textarea style='width: 50%; height: 200px;' type="text" name='content' id='contentinput' required><?php echo $post['content']; ?></textarea>
            </section>

            <input style='margin-bottom: 10px' class='submit' type="submit" name='editPost' value="Submit">
        </form>  
    </section>
<?php
    } else {
        header('Location: ../phpblog2/notAllowed.php'); 
    }
?>
</body>
</html>