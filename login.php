<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='st.css'>
</head>
<body>
    <header>
        <section id='logo'>
            <img style='width: 200px;' src="image.png" alt="">
        </section>
        <section id='links'>
     
        </section>
    </header>
    <section id='content'>
        <form method='POST' action="process.php">

            <img src="image.png" alt="">
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
    </section> 
</body>
<style>
    #content {
        margin-top: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #content form{
        background-color: rgb(224, 224, 224);
        width: 400px;
        min-width: 400px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 30vh;
        border-radius: 10px;
    }

    #content form img{
        width: 50%;  
    }

    #content form > input{
        background-color: rgba(255,86,23,255);
        width: 100px;
        height: 30px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #content form > input:hover {
        background-color: rgb(238, 127, 0);
    }
</style>
</html>
