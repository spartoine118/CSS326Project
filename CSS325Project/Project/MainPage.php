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
            <form action="SearchPage.php" method="GET">
                <input name="SearchSubmit" type="submit" value="search">
                <input type="text" id="ItemSearch" name="ItemSearch">
                <input type="hidden" id="page" name="page" value="1">
                
            </form>
        </div>
        <div class="NewItems" id="NewItems">
            <?php getNewItems($conn); ?>
            <a class="SeeMorebtn" id="SeeMorebtn" href="SearchPage.php">See more</a>
        </div>
        <div class="PopularItems" id="PopularItems">
            <?php getPopularItems($conn) ?>
            <a class="SeeMorebtn" id="SeeMorebtn" href="SearchPage.php">See more</a>
        </div>
    </div>
</body>
<script src="MainPage/MainPage.js"></script>

</html>