<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='st.css'>
</head>
<?php
    include_once 'classes/class.posts.php';
    include_once 'classes/class.user.php';
  
    $post = new Post();
    $posts = $post->fetchAll("DESC");

    $user = new User();
    $users = $user->fetchAll();

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
        <section style='margin-top: 50px; margin-bottom: 50px; display: flex; gap: 100px;' id='allposts'>
            <section class='table' style="width: 40%;">
                <h2>Post history</h2>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: rgb(224, 224, 224);">
                                Title
                            </th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: rgb(224, 224, 224);">
                                Actions
                            </th>    
                        </tr>
                    <?php foreach($posts as $post) { ?>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: #f2f2f2;">
                                <?php echo $post['title']; ?>
                            </th>
                            <th style="display: flex; gap: 10px; border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: #f2f2f2;">
                                <a href="editPost.php?<?php echo 'id=' . $post['id'] ?>"><button class='login'>Edit</button></a>
                                <form method="post" action="process.php"> 
                                    <button type="submit" value='<?php echo $post['id']; ?>' class='login' name="deletePost">Delete</button>
                                </form>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
            </section>
            <section class='table' style="width: 40%;">
                <h2>User overview</h2>
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: rgb(224, 224, 224);">
                                Username
                            </th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: rgb(224, 224, 224);">
                                Role
                            </th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: rgb(224, 224, 224);">
                                Actions
                            </th>    
                        </tr>
                    <?php foreach($users as $user) { ?>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: #f2f2f2;">
                                <?php echo $user['username']; ?>
                            </th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: #f2f2f2;">
                                <?php   
                                    if($user['role_id'] == 1) {
                                        echo 'Admin';
                                    } else {
                                        echo 'User';
                                    }
                                ?>
                            </th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px; background-color: #f2f2f2;">
                                <form style='display: flex;' method="post" action="process.php">
                                    <?php   
                                        if($user['role_id'] == 0) {
                                            ?> <button type="submit" class='login' value='<?php echo $user['id']; ?>' name="deleteUser">Delete</button> <?php
                                        }
                                    ?>
                                </form>
                            </th>
                        </tr>
                    <?php } ?>
                </table>
            </section>     
        </section>

    </section>
<?php
    } else {
        header('Location: ../phpblog2/notAllowed.php');
    }
?>    
    
</body>
</html>