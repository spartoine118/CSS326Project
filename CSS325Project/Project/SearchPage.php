<!DOCTYPE html>
<html lang="en">
<?php require_once 'SearchPage/SearchPageFunction.php' ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SearchPage/SearchPage.css">
    <title>Searchpage</title>
</head>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class ="SearchBody" id="SearchBody">
    <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <form action="SearchPage.php" method="POST">
            <?php createFilterList($conn); ?>
            <input type="submit" name="filterConfirm" value="Confirm">
            <input style="display: none;" name="invisVar1" value="<?php if (isset($_POST['ItemSearch'])){ echo trim($_POST['ItemSearch']);}
            else if (isset($_POST['filterConfirm'])){
                echo trim($_POST['invisVar1']);
            }
            ?>">
    </div>
        <div class="SearchBar" id="SearchBar">
        <form action="SearchPage.php" method="POST">
                <input name="SearchSubmit" type="submit" value="search">
                <input type="text" id="ItemSearch" name="ItemSearch" value="<?php if(isset($_POST['ItemSearch'])){ echo trim($_POST['ItemSearch']);}
                else if (isset($_POST['filterConfirm'])){
                    echo trim($_POST['invisVar1']);
                    $_POST['ItemSearch'] = trim($_POST['invisVar1']);
                }
                ?>"><br><br>
            </form>
        </div>
        <div class="ItemSearchDisplay" id="ItemSearchDisplay">
            <?php 
                $result = getItems($conn);
                displayNewItem($result);
            ?>
            <div class="NewItemsTest" id="NewItemsTest">
                <img width="256" height="256">
                <a href="#">ProductName</a>
                Price
            </div>
        </div>
    </div>
</body>
<script src="SearchPage/SearchPage.js"></script>
</html>