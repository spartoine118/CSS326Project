<div class="header" id="header">
        <div class="sidebarbtn" id="sidebarbtn">
            <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>
        </div>
        <div class="username" id="username">
            <?php 
            if(isset($_SESSION['username'])){
                echo "<a href='login.php'>".$_SESSION['username']."</a>
                <a href='temp.php'> logout </a>
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
    </div>
