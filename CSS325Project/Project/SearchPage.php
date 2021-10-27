<!DOCTYPE html>
<html lang="en">
<?php require_once 'SearchPage/SearchPageFunction.php'; ?>
<head>
    <style>
        .pagecnt{
            text-align: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SearchPage/SearchPage.css">
    <title>Searchpage</title>
</head>
<body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class ="SearchBody" id="SearchBody">
        <div class="SearchBar" id="SearchBar">
            <form action="SearchPage.php?page=1" method="GET">
            <input name="SearchSubmit" type="submit" value="search">
            <input type="hidden" id="page" name="page" value="1">
            <input type="text" id="ItemSearch" name="ItemSearch" value="<?php if(isset($_GET['ItemSearch'])){ echo trim($_GET['ItemSearch']);}
            ?>"><br><br>
        </form>
            
        </div>
        
        <div class="ItemSearchDisplay" id="ItemSearchDisplay">
            <?php 
                $result = getItems($conn);
                displayNewItem($result,$conn);
            ?>
        </div>
    </div>
    <?php getTotalPage($conn); ?>
</body>
<script src="SearchPage/SearchPage.js"></script>
</html>