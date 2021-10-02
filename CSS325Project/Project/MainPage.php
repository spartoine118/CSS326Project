<!DOCTYPE html>
<html lang="en">
<?php require_once 'MainPage/MainPageFunctions.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainPage/MainPage.css">
    <title>CSSProject</title>
</head>

<body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class="MainBody" id="MainBody">
        <div class="SearchBar" id="SearchBar">
            <form action="SearchPage.php" method="POST">
                <input name="SearchSubmit" type="image" alt="Submit">
                <input type="text" id="ItemSearch" name="ItemSearch">
                
            </form>
        </div>
        <div class="NewItems" id="NewItems">
            <?php getNewItems($conn); ?>
            <a class="SeeMorebtn" id="SeeMorebtn" href="#">See more</a>
        </div>
        <div class="PopularItems" id="PopularItems">
            <div class="NewItemsTest" id="NewItemsTest">
                <img width="256" height="256">
                <a href="#">ProductName</a>
                Price
            </div>
            <div class="NewItemsTest" id="NewItemsTest">
                <img width="256" height="256">
                <a href="#">ProductName</a>
                Price
            </div>
            <a class="SeeMorebtn" id="SeeMorebtn" href="#">See more</a>
        </div>
    </div>
</body>
<script src="MainPage/MainPage.js"></script>

</html>