<?php 
date_default_timezone_set('Asia/Bangkok');
?>
<link rel="stylesheet" href="header.css">
<div class="header" id="header">
        <div class="sidebarbtn" id="sidebarbtn">
            <button class="openbtn" onclick="openNav()">☰ </button>
        </div>
        <div class="home">
        <a href="MainPage.php">Home Page</a>
        </div>
        <div class="username" id="username">
            <?php
             if(isset($_SESSION['username'])){
                $sql = "SELECT * FROM userimage WHERE userNAME = '".$_SESSION['username']."';";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $sql2 = "SELECT * FROM userimage WHERE userNAME = '".$_SESSION['username']."';";
                $result2 = mysqli_query($conn,$sql2);
                $queryResults2 = mysqli_num_rows($result2);
                            
                echo "<a href='ProfilePage.php'>";
                if($queryResults2 > 0){
                    while($row2 = mysqli_fetch_assoc($result2)){
                        if($row2['status'] == 1){
                            echo "<img src='Login_SignUp/Uploads/UserImage/".$row['userID'].".".$row['fileEXT']."' alt='UserPicture' width='32' height='32'></a>";
                        }
                        else{
                            echo "<img src='images/user_picture.png' width='32' height='32'></a>";
                        }
                    } 
                } 
                else{
                    echo "<img src='images/user_picture.png' width='32' height='32'></a>";
                } 
                   

                ;
            }
            else{
                echo "<a href='login.php'> login </a>";
            }

        ?>            
        </div>
        <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">☰</a>    
        <a href="MainPage.php">Home Page</a>

        <?php 
            if(isset($_SESSION['username'])){
                echo "<a href='AddProductPage.php'> Add product</a>";
                echo "<a href='CartPage.php'> My Cart</a>";
                echo "<a href='MyproductPage.php'> My products</a>";
                echo "<a href='ProfilePage.php'> My Profile</a>";
                echo "<a href='WriteMessage.php'> Send a message </a>";
                echo "<a href='UserMail.php'> Your inbox </a>";
                echo "<a href='logout.php'> Logout </a>";
            }            
        ?>            
        </div>  
    </div>
