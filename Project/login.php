<?php include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel ="stylesheet" href ="style_login.css">
</head>
<body>
    
    <div class = "center" id = "center">      
          <h1>Login</h1>               
        <form action = "Login_SignUp\login_db.php" method='POST'>
            <div class = "input" id = "input">                
                <input type = "text" name="username" placeholder="Username">
            </div>
            <div class = "input" id = "input">                
                <input type = "password" name="password" placeholder="Password">
            </div>        
            <div class = "button" >                
                <button type="submit" name = "login_user" class="btn" >login</button>
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
    </div>

</body>
</html>