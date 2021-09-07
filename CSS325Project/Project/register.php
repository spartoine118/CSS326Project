<?php include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel ="stylesheet" href ="style.css">
</head>
<body>
    <div class = "header">
        <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
        <h2>Register</h2>
    </div> 
    <form action = "Login_SignUp\register_db.php" method='POST'>
        <div class = "input">
            <label for = "username">username</label>
            <input type = "text" name="username" >
        </div>
        <div class = "input">
            <label for = "password_1">password</label>
            <input type = "password_1" name="password_1">
        </div>
        <div class = "input">
            <label for = "password_2">Confirm Password</label>
            <input type = "password_2" name="password_2">
        </div>
        <div class = "input">
            <button type="submit" name = "reg_user" class="btn">Register</button>
        </div>
        <?php 
            if(isset($_SESSION['error'])){
                foreach($_SESSION['error'] as $errors){
                    echo $errors. "<br>";
                    }
                unset($_SESSION['error']);
                }
        ?>
        <p>Already a member? <a href = "login.php">Sign in</a></p>
    </form>
</body>
</html>