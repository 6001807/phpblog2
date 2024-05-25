<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='sty.css'>
</head>
<?php
    session_start();

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
    <section id='panel'>
        <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
        <section id='new'>
            <form method='POST' action="process.php">
                <h2>New user</h2>
                <section class="credentials">
                    <label for="username">Username:</label>
                    <input type="text" name='username' id='username' required> 
                </section>
                
                <section class="credentials">
                    <label for="password">Password:</label>
                    <input type="text" name='password' id='password' required>
                </section>
                
                <section class="credentials-radio">
                    <label>Role:</label><br>
                    <input type="radio" name="role_id" value="1"> Admin<br><input type="radio" name="role_id" value="0" checked> User<br>
                </section>

                <input class='submit' type="submit" name='newUser' value="Submit">
            </form>

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
                    <textarea style='width: 250%; height: 200px;' type="text" name='content' id='contentinput' required></textarea>
                </section>

                <section class="credentials">
                    <label for="fileToUpload">Image:</label>
                    <input style='padding: 0;' type="file" name="FileToUpload" id="fileToUpload" required>
                </section>

                <input class='submit' type="submit" name='newPost' value="Submit">
            </form>
        </section>
    </section>
<?php
    } else {
        header('Location: ../phpblog2/notAllowed.php');
    }
?>    
    
</body>
</html>