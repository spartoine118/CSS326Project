<?php include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel ="stylesheet" href ="style.css">
</head>
<body>
    <div class = "header">
        <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
        <h2>login</h2>
    </div>
    <form action = "Login_SignUp\login_db.php" method='POST'>
        <div class = "input">
            <label for = "username">username</label>
            <input type = "text" name="username">
        </div>
        <div class = "input">
            <label for = "password">password</label>
            <input type = "password" name="password">
        </div>
        
        <div class = "input">
            <button type="submit" name = "login_user" class="btn">login</button>
        </div>
        <?php
            if(isset($_SESSION['error'])){
                foreach($_SESSION['error'] as $errors){
                    echo $errors. "<br>";
                    }
                unset($_SESSION['error']);
                }
        ?>
        <p>Not yet a member? <a href = "register.php">Sign Up</a></p>
    </form>
</body>
</html>