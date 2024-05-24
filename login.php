<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='styles.css'>
</head>
<body>
    <form method='POST' action="process.php">
        <section class="credentials">
            <label for="username">Username:</label>
            <input type="text" name='username' id='username' required> 
        </section>
        
        <section class="credentials">
            <label for="password">Password:</label>
            <input type="text" name='password' id='password' required>
        </section>  

        <input class='submit' type="submit" name='login' value="Submit">
    </form>
</body>
</html>
