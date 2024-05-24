<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<?php
    session_start();

    if($_SESSION['role_id'] == 1) {
?>
<body>
    <section class='link'>
        <p><a href="../phpblog2/home.php">Back to home</a></p>
    </section>
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

        <form method='POST' action="process.php">
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
                <input type="text" name='content' id='content' required>
            </section>

            <input class='submit' type="submit" name='newPost' value="Submit">
        </form>
    </section>
<?php
    } else {
        header('Location: ../phpblog2/notAllowed.php');
    }
?>    
    
</body>
</html>