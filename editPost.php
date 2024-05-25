<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='./styl.css'>
</head>
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
            <h2>New post</h2>
            <section class="credentials">
                <label for="title">Title:</label>
                <input type="text" name='title' id='title' required> 
            </section>
            
            <section class="credentials">
                <label for="desc">Description:</label>
                <input type="text" name='desc' id='desc' required>
            </section>
            
            <section class="credentials">
                <label for="content">Content:</label>
                <input type="text" name='content' id='contentinput' required>
            </section>

            <section class="credentials">
                <label for="fileToUpload">Image:</label>
                <input style='padding: 0;' type="file" name="FileToUpload" id="fileToUpload" required>
            </section>

            <input class='submit' type="submit" name='newPost' value="Submit">
        </form>  
    </section>
</body>
</html>