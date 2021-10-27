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

<style>
    body{
        margin:auto;
        height: 500px;
        width: 500px;
        position: relative;
    }

    .center{
        margin-top:10%;
        border-radius: 20px;
        -webkit-box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
        box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
        padding-top: 5%;
        text-align: center;
        padding-bottom: 40%;
        background-color: white;
        
    }
    .center form {
        padding: 0 40px;
        box-sizing: border-box;
    }

    .center h2{
        padding-bottom: 10%;
    }

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

    .header{
        color:#404EED;
    }

    .btn{
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
</style>
<body>
    <div class="center">
        <div class = "header">        
            <h2><?php if(isset($_POST['ModifyUser'])){echo "Change information";}else{echo "Register";}?></h2>
        </div> 
        <form action = "Login_SignUp\register_db.php" method='POST' enctype='multipart/form-data'>

            <div class = "input">
                <label for = "username"></label>
                <input type = "text" name="username" value='<?php if(isset($_POST['ModifyUser'])){echo $_POST['UserName'];}?>' placeholder="Username">
            </div>
            <div class = "input">
                <label for = "firstName"></label>
                <input type = "text" name="firstName" value='<?php if(isset($_POST['ModifyUser'])){echo $_POST['firstname'];}?>'placeholder="First Name">
            </div>
            <div class = "input">
                <label for = "lastName"></label>
                <input type = "text" name="lastName" value='<?php if(isset($_POST['ModifyUser'])){echo $_POST['lastname'];}?>' placeholder="Last Name">
            </div>
            <div class = "upload_image">
                    <label for = "userImage">Upload a profile picture</label>
                    <input type='file' name='userImage'></input>
            </div>

            <div class = "input">
                <label for = "password_1"></label>
                <input type ="password" name="password_1" placeholder="Password">
            </div>
            <div class = "input">
                <label for = "password_2"></label>
                <input type ="password" name="password_2" placeholder="Confirm Password">
            </div>

            <?php if(isset($_POST['ModifyUser'])){
                echo "<input type='hidden' name='uID' value='".$_POST['uID']."'>";
                echo "<input type='hidden' name='userImage' value='".$_POST['userImage']."'>"; 
            }?>
            <div class = "button_register">
                <?php if(isset($_POST['ModifyUser'])){
                    echo "<button type='submit' name = 'ModifyUser2' class='btn'>Change Information</button>";
                }
                else{
                    echo '<button type="submit" name = "reg_user" class="btn">Register</button>';
                }?>
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
            <a href = "MainPage.php">Home page</a>
        </form>
    </div>
</body>
</html>