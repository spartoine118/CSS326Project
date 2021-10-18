<?php 
date_default_timezone_set('Asia/Bangkok');
?>

<div class="header" id="header">
        <div class="sidebarbtn" id="sidebarbtn">
            <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>
        </div>
        <a href="MainPage.php">Home Page</a>
        <div class="username" id="username">
            <?php 
            if(isset($_SESSION['username'])){
                $sql = "SELECT * FROM userimage WHERE userNAME = '".$_SESSION['username']."';";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo "<a href='login.php'>".$_SESSION['username']."</a>
                <a href='logout.php'> logout </a>
                <a href='ProfilePage.php'>
                    <img src='Login_SignUp/Uploads/UserImage/".$row['userID'].".".$row['fileEXT']."' alt='UserPicture' width='32' height='32'>
                </a>";
            }
            else{
                echo "<a href='login.php'> login </a>
                <a href='#'>
                    <img alt='UserPicture' width='32' height='32'>
                </a>";
            }
            ?>
        </div>
        <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>    
        <a href="MainPage.php">Home Page</a>
        <?php 
            if(isset($_SESSION['username'])){
                echo "<a href='AddProductPage.php'> Add product</a>";
                echo "<a href='CartPage.php'> My Cart</a>";
                echo "<a href='MyproductPage.php'> My products</a>";
                echo "<a href='ProfilePage.php'> My Profile</a>";
                echo "<a href='WriteMessage.php'> Send a message </a>";
                echo "<a href='UserMail.php'> Your inbox </a>";
            }
            ?>
        </div>  
    </div>
