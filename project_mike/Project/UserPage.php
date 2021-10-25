<?php require_once 'C:\xampp\htdocs\CSS325Project\Project\dbh.php';?>




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
    <?php include_once 'C:\xampp\htdocs\CSS325Project\Project\Header.php'; ?>
        <div class = "Profile" id="Profile">
        <nav class="navMenu">
            <?php echo "
            <a href='UserPage.php?uname=".$_GET['uname']."'>Profile</a>
            <a href='UserProduct.php?uname=".$_GET['uname']."'>Product</a>
            "; 
            ?>
            <div class="dot"></div>
        </nav>
            <h2>Profile</h2>    
                    <div class = "content">
                        <!--  user information -->
                        <p> Username:<strong><?php echo $_GET['uname']; ?></strong></p>
                        
                    </div>
         </div>
    </body>
    <script src="ProfilePage/ProfilePage.js"></script>
</html>