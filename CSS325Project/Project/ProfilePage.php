<?php require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';?>

<?php

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page:)</title>
        <link rel="stylesheet" href="ProfilePage/ProfilePage.css">
    </head>

    <body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
        
        <div class = "Profile" id="Profile">
        <nav class="navMenu">
            <?php echo "
            <a href='UserPage.php?uname=".$_SESSION['username']."'>Profile</a>
            <a href='UserProduct.php?uname=".$_SESSION['username']."'>Product</a>
            "; 
            ?>
            <div class="dot"></div>
        </nav>
            <h2>Profile</h2>    
                    <div class = "content">
                        <!--- notification--->
                        <?php if (isset($_SESSION['username'])) : 
                                $sql = "SELECT * FROM users WHERE userNAME = '".$_SESSION['username']."';";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $sql2 = "SELECT * FROM userimage WHERE userNAME = '".$_SESSION['username']."';";
                                $result2 = mysqli_query($conn,$sql2);
                                $row2 = mysqli_fetch_assoc($result2);?>
                            <p> Username:<strong><?php echo $_SESSION['username']; ?></strong></p>
                            <p> First name:<strong><?php echo $row['firstName']; ?></strong></p>
                            <p> Last name:<strong><?php echo  $row['lastName']; ?></strong></p>
                            <p> Profile picture:<strong><?php echo "<img src='Login_SignUp/Uploads/UserImage/".$row2['userID'].".".$row2['fileEXT']."' alt='UserPicture' width='128' height='128'></strong></p>" ?>
                            <div class = "logout" id = "logout">
                                <p>
                                <form action ='register.php' method='POST'>
                                    <input class='deleteItem' type='submit' name='ModifyUser' value='Change information'>
                                    <input type='hidden' name='UserName' value='<?php echo $row['username']?>'>
                                    <input type='hidden' name='firstname' value='<?php echo $row['firstName']?>'> 
                                    <input type='hidden' name='lastname' value='<?php echo $row['lastName']?>'> 
                                    <input type='hidden' name='uID' value='<?php echo $row['id']?>'> 
                                    <input type='hidden' name='userImage' value='<?php echo "".$row2['userID'].".".$row2['fileEXT'].""?>'> 
                                </form> 
                                    <a href="index.php?logout='1'" style="color: red;">Logout</a>
                                </p>
                            </div>
                        <?php endif ?>
                        
                    </div>
         </div>
    </body>
    <script src="ProfilePage/ProfilePage.js"></script>
</html>