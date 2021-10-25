<?php include('C:\xampp\htdocs\CSS325Project\Project\dbh.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel ="stylesheet" href ="style_register.css">
</head>
<body>
    <div class="center">
        <h1>Register</h1>
        <form action = "Login_SignUp\register_db.php" method='POST'>
            
            <div class = "input">
            
                <input type = "text" name="username" placeholder="username" >
            </div>
            <div class = "input">
        
                <input type = "password_1" name="password_1" placeholder="Password">
            </div>
            <div class = "input">
                
                <input type = "password_2" name="password_2" placeholder="Confirm Password">
            </div>
            <div class = "button">
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
    </div>
</body>
</html>