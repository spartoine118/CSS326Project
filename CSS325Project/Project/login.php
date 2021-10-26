<?php include('C:\xampp\htdocs\CSS325Project\Project\dbh.php');
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
<style> 

    body {
    height: 500px;
    width: 500px;
    position: relative;    
    }
    
    .center {
        border-radius: 20px;
        -webkit-box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
        box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
        padding-top: 5%;
        text-align: center;
        padding-bottom: 40%;
        background-color: white;
        
    }
    
    .center h1 {
        text-align: center;
        /* padding: 20px 0;*/
        color: #404EED;
        padding-bottom: 10%;
    }
    
    .center form {
        padding: 0 40px;
        box-sizing: border-box;
    }
    /*text field*/
    
    form .input {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
    }
    
    input[type=text] {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        color:black;
       
    }
    
    input[type=password] {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        color:black;
        
    }
    /*button*/
    
    .btn {
        align-items: center;
        background-color: #404EED;
        border: 0;
        border-radius: 100px;
        box-sizing: border-box;
        color: #ffffff;
        cursor: pointer;
        display: inline-flex;       
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 20px;
        max-width: 480px;
        min-height: 40px;
        min-width: 0px;
        overflow: hidden;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        text-align: center;
        touch-action: manipulation;
        transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
    }
    
    .btn:hover,
    .btn:focus {
        /*background-color: #16437E;*/
        color: #ffffff;
    }
    
    .btn:active {
        background: #09223b;
        color: rgb(255, 255, 255, .7);
    }
    
    .btn:disabled {
        cursor: not-allowed;
        background: rgba(0, 0, 0, .08);
        color: rgba(0, 0, 0, .3);
    }
    
    p {
        color: black;
    }
    
    a:link,
    a:visited {
        text-decoration: none;
        color: #404EED;
    }
    
    form {
        color: red;
    }
</style>
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