<!DOCTYPE html>
<html lang="en">
<?php require_once 'CartPage/CartPageFunction.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CartPage/CartPage.css">
    <title>Searchpage</title>
</head>
<body>
    <?php include_once 'C:\xampp\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class ="SearchBody" id="SearchBody">
    <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <div class="MainBody" id="MainBody">
    <div class="SearchBar" id="SearchBar">
            <form action="SearchPage.php" method="GET">
                <input name="SearchSubmit" type="submit" value="search">
                <input type="text" id="ItemSearch" name="ItemSearch">
                <input type="hidden" id="page" name="page" value="1">
            </form>
        </div>
        <div class="cartDisplay" id="cartDisplay">
            <?php getCartItems($conn) ?>
        <?php getTotalPrice($conn) ?>
        </div>
</body>
<script src="CartPage/CartPage.js"></script>
</html>