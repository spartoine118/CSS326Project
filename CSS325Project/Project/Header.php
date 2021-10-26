<?php 
date_default_timezone_set('Asia/Bangkok');
?>
<link rel="stylesheet" href="header.css">
<style>

body{
    margin:0;
}
.header {
    height: 19.8%;
    min-height: fit-content;
    background-color: white;
    border-bottom: 0.0625rem solid #e0e0e0;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    justify-content: space-between;
    padding-bottom: 0.5%;
    -webkit-box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    margin-top: 0%;
    
}

.username {
    padding-top: 0.8%;
    padding-right: 0.8%;
}

a:link,
a:visited {
    text-decoration: none;
    color: #404EED;
    padding-top: 0.8%;
    font-size: 20px;
}

.openbtn {
    align-items: center;
    background-color:#404EED;
    border: 0;
    color: white;
    /* border-radius-right: 20px;*/
    border-bottom-right-radius: 20px;
    cursor: pointer;
    display: inline-flex;
    font-size: 20px;
    font-weight: 600;
    justify-content: center;
    line-height: 20px;
    max-width: 480px;
    min-height: 40px;
    min-width: 0px;
    overflow: hidden;
    margin-left: 0;
    padding-left: 18px;
    padding-right: 20px;
    transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
    user-select: none;
    -webkit-user-select: none;
    vertical-align: middle;
    -webkit-box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
}

.home {
    font-weight: bold;
    padding-top: 1.2%;
}

.sidebarbtn {
    margin: 0%;
    
    
}

.MenuSidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color:white;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    -webkit-box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    border-right: 0.0625rem solid #e0e0e0;
    color:#404EED;    
   
}
.MenuSidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    color: #404EED;
    display: block;
    transition: 0.3s;
}


.closebtn {
    right: 10px;
    color:#404EED;
}
</style>

<div class="header" id="header">
        <div class="sidebarbtn" id="sidebarbtn">
            <button class="openbtn" onclick="openNav()">☰ </button>
        </div>
        <div class="home">
        <a href="MainPage.php">Antoine Shop</a>
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
