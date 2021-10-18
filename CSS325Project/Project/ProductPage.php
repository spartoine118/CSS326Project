<!DOCTYPE html>
<html lang="en">
<?php require_once 'ProductPage/ProductPageFunction.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ProductPage/ProductPage.css">
    <title>Document</title>
<style>

    textarea{
        resize: none;   
        width: 400px;   
        height: 80px;
        margin: 0px 5px 
    }
    .comments {
        margin: 5px 0px 5px 5px;
        width: fit-content;
        max-width: 800px;
        padding: 5px;   
        border: red solid 5px;
        display: grid;
        text-align: left;
        gap: 5px;
    }
</style>
</head>
<body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
    <div class="SearchBar" id="SearchBar">
            <form action="SearchPage.php" method="GET">
                <input name="SearchSubmit" type="submit" value="search">
                <input type="texts" id="ItemSearch" name="ItemSearch">
                <input type="hidden" id="page" name="page" value="1">
            </form>
        </div>
    <?php
    $productID = mysqli_real_escape_string($conn, $_GET['pID']);
    if(isset($_SESSION['userPrivilege']) AND $_SESSION['userPrivilege'] == 'Admin'){
        echo "<form action = 'Admin\AdminFunctions.php' method='POST'>
        <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
        <input type='hidden' name='productID' value='".$productID."'> 
        </form>";
    } 
    ?>
    <div class ="ProductBody" id="ProductBody">
            <div class="ProductDisplay" id="ProductDisplay">
                <?php 
                    $productname = mysqli_real_escape_string($conn, $_GET['name']);
                    $productdate = mysqli_real_escape_string($conn, $_GET['date']);
                    $productID = mysqli_real_escape_string($conn, $_GET['pID']);
                    $sql = "SELECT * FROM  products WHERE productsName='$productname' AND productsDate ='$productdate' AND productsID ='$productID'";
                    $result = mysqli_query($conn,$sql);
                    $queryResults = mysqli_num_rows($result);
                    if($queryResults > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='ProductMain' id='ProductMain'>
                            <h2>".$productname."</br><a href='UserPage.php?uname=".$row['userName']."'>".$row['userName']."</a></h2>";
                            $sql2 = "SELECT * FROM  productimage WHERE productName='$productname' AND productID ='$productID'";
                            $result2 = mysqli_query($conn,$sql2);
                            $queryResults2 = mysqli_num_rows($result2);
                            if($queryResults2 > 0){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    if($row2['status'] == 1){
                                        echo "<img src='AddProductPage/Uploads/ProductsImage/".$row2['productID'].".".$row2['fileEXT']."' alt='picture of product'>";
                                    }
                                    else{
                                        echo "<img src='images/abyd9viyvwf71.png'>";
                                    }
                                } 
                            } 
                            else{
                                echo "<img src='images/abyd9viyvwf71.png'>";
                            } 
                            echo "<form action = 'ProductPage\ProductPageFunction.php' method='POST'>
                                <input class='addCartButton' type='submit' name='AddToCart' value='Add to cart'>
                                <input type='hidden' name='productID' value='".$productID."'> 
                                <input type='hidden' name='productdate' value='".$productdate."'>
                                <input type='hidden' name='productname' value='".$productname."'>  
                            </form>
                            </div>
                            <div class='ProductDetail' id='ProductDetail'>
                                ".$row['productsDetail']."  
                            </div>";
                            include('Ratings/Ratings.php');
                            echo "<div class='productPrice' id='productPrice'> ".$row['productsPrice']."$
                            </div>";
                        }
                    }
                ?>
                <?php 
                if (isset($_SESSION['username'])){
                    echo " <div class='commentbox' id='commentbox'>
                    <form method='POST' action='".setComment($conn)."'>
                        <input type='hidden' name='username' value='".$_SESSION['username']."'>
                        <input type='hidden' name='productname' value='".$productname."'>
                        <input type='hidden' name='productID' value='".$productID."'>  
                        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'> 
                        <textarea name='comment'></textarea></br>
                        <button style='margin: 0px 5px 5px 5px;'
                        name='commentSubmit' type='submit'>Comment</button>
                    </form>
                </div>";
                }
                ?>
            </div>  
            <?php 
            getComment($conn,$productname);
            ?>

        

</body>
<script src="ProductPage/ProductPage.js"></script>
</html>