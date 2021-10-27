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

    <style>
   .header {
    height: 20%;
    min-height: fit-content;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    justify-content: space-between;
}

.Profile {
    margin-top: 50px;
    -webkit-box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.23);
    box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.23);
    padding: 10px;
    text-align: center;
    background-color:white;
    max-width: 30%;
    margin-left: 35%;
    justify-self: center;
    border-radius:20px;
}

.logout {
    text-align: right;
}

.sidebarbtn {
    margin: 5px;
}

.username {
    margin: 5px;
}

.username a {
    margin: 5px;
}

.MainBody {
    height: 80%;
    display: grid;
    gap: 50px;
}

.SearchBar {
    margin-top: 10px;
    text-align: center;
    align-content: center;
}

.MenuSidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.MenuSidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.MenuSidebar a:hover {
    color: #f1f1f1;
}

.MenuSidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 25px;
    margin-left: 50px;
}

@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap");
* {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

body {
    background: white;
}

.navMenu a {
    color: black;
    text-decoration: none;
    font-size: 1.2em;
    text-transform: uppercase;
    font-weight: 500;
    display: inline-block;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    margin-right: 20px;
}

.navMenu a:hover {
    color: red;
}

.closebtn {
    right: 10px;
}

h2,p{
    color: #404EED;
    
}
</style>

    <body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
        <div class = "Profile" id="Profile">
        
        <?php $sql = "SELECT * FROM users WHERE userNAME = '".$_GET['uname']."';";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $sql2 = "SELECT * FROM userimage WHERE userNAME = '".$_GET['uname']."';";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);?>
            <h2>Profile</h2>    
                    <div class = "content">
                        <!--  user information -->
                        <?php                                 if($row2['status'] == 0){
                                    echo "<p> <strong><img src='images/user_picture.png' width='128' height='128'></strong></p>";
                                }
                                else{
                                    echo "<p> <strong><img src='Login_SignUp/Uploads/UserImage/".$row2['userID'].".".$row2['fileEXT']."' width='128' height='128'></strong></p>";
                                }
                                ?>
                        <p> Username:<strong><?php echo $_GET['uname']; ?></strong></p>
                        <p> First name:<strong><?php echo $row['firstName']; ?></strong></p>
                        <p> Last name:<strong><?php echo  $row['lastName']; ?></strong></p>
                        
                        
                    </div><nav class="navMenu">
            <?php
            if(isset($_SESSION['username']) && $_SESSION['username'] == $_GET['uname']){
                echo "
                <a href='ProfilePage.php?'>Profile</a>
                <a href='MyproductPage.php'>Product</a>
                "; 
            }
            else{
                echo "
                <a href='UserPage.php?uname=".$_GET['uname']."'>Profile</a>
                <a href='UserProduct.php?uname=".$_GET['uname']."'>Product</a>
                "; 
            }
            ?>
            <div class="dot"></div>
        </nav>
         </div>
    </body>
    <script src="ProfilePage/ProfilePage.js"></script>
</html> 