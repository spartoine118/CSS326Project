<!DOCTYPE html>
<html lang="en">
<?php require_once 'SearchPage/SearchPageFunction.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ProductPage/ProductPage.css">
    <title>Document</title>
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
        <form action="SearchPage.php" method="POST">
            <input name="SearchSubmit" type="image" alt="Submit">
            <input type="text" id="ItemSearch" name="ItemSearch">
                
        </form>
    </div>
    <div class ="ProductBody" id="ProductBody">
            <div class="ProductDisplay" id="ProductDisplay">
                <?php 
                    $productname = mysqli_real_escape_string($conn, $_GET['name']);
                    $productdate = mysqli_real_escape_string($conn, $_GET['date']);
                    $sql = "SELECT * FROM  products WHERE productsName='$productname' AND productsDate ='$productdate'";
                    $result = mysqli_query($conn,$sql);
                    $queryResults = mysqli_num_rows($result);
                    if($queryResults > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='ProductMain' id='ProductMain'>
                            <h2>".$productname."</h2>
                            <img src='abyd9viyvwf71.png' alt='picture of product'>
                            <input class='addCartButton' type='button' name='AddToCart' value='Add to cart'>
                            </div>
                            <div class='ProductDetail' id='ProductDetail'>
                                ".$row['productsDetail']."  
                            </div>
                            <div class='productPrice' id='productPrice'> ".$row['productsPrice'];"
                            </div>";
                        }
                    }
                ?> 
            </div>
        

</body>
<script src="ProductPage/ProductPage.js"></script>
</html>