<?php require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';?>




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
            <a href='UserPage.php?uname=".$_GET['uname']."'>Profile</a>
            <a href='UserProduct.php?uname=".$_GET['uname']."'>Product</a>
            "; 
            ?>
            <div class="dot"></div>
        </nav>
        <?php $sql = "SELECT * FROM users WHERE userNAME = '".$_GET['uname']."';";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $sql2 = "SELECT * FROM userimage WHERE userNAME = '".$_GET['uname']."';";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);?>
            <h2>Profile</h2>    
                    <div class = "content">
                        <!--  user information -->
                        <p> Username:<strong><?php echo $_GET['uname']; ?></strong></p>
                        <p> First name:<strong><?php echo $row['firstName']; ?></strong></p>
                        <p> Last name:<strong><?php echo  $row['lastName']; ?></strong></p>
                        <p> Profile picture:<strong><?php echo "<img src='Login_SignUp/Uploads/UserImage/".$row2['userID'].".".$row2['fileEXT']."' alt='UserPicture' width='128' height='128'></strong></p>" ?>
                        
                    </div>
         </div>
    </body>
    <script src="ProfilePage/ProfilePage.js"></script>
</html>