<div class="header" id="header">
        <div class="sidebarbtn" id="sidebarbtn">
            <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>
        </div>
        <div class="username" id="username">
            <?php 
            if(isset($_SESSION['username'])){
                echo "<a href='login.php'>".$_SESSION['username']."</a>
                <a href='logout.php'> logout </a>
                <a href='#'>
                    <img alt='UserPicture' width='32' height='32'>
                </a>>";
            }
            else{
                echo "<a href='login.php'> login </a>
                <a href='#'>
                    <img alt='UserPicture' width='32' height='32'>
                </a>>";
            }
            ?>
        </div>
        <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="MainPage.php">Home Page</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
        <?php 
            if(isset($_SESSION['username'])){
                echo "<a href='AddProductPage.php'> Add product</a>";
                echo "<a href='CartPage.php'> My Cart</a>";
            }
            ?>
        </div>  
    </div>
