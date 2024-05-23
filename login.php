<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='POST' action="home.php">
        <section class="credentials">
            <label for="username">Username:</label>
            <input type="text" name='username' id='username'> 
        </section>
        
        <section class="credentials">
            <label for="password">Password:</label>
            <input type="text" name='password' id='password'>
        </section>  

        <input type="submit" value="Submit">
    </form>
</body>

<style>
    body > form {
        display: flex;
        flex-direction: column;
        width: 200px;
        gap: 10px;
    }

    .credentials > input{
        width: 100%;
        padding: 0;
        margin: 0;
    }
</style>
</html>