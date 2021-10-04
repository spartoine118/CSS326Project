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
                        <?php if (isset($_SESSION['username'])) : ?>
                            <p> Username:<strong><?php echo $_SESSION['username']; ?></strong></p>
                            <div class = "logout" id = "logout">
                                <p>
                                    <a href="index.php?logout='1'" style="color: red;">Logout</a>
                                </p>
                            </div>
                        <?php endif ?>
                        
                    </div>
         </div>
    </body>
    <script src="ProfilePage/ProfilePage.js"></script>
</html>