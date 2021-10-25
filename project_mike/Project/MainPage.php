<!DOCTYPE html>
<html lang="en">
<?php require_once 'MainPage/MainPageFunctions.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_MainPage.css">
    <title>CSSProject</title>
</head>
<style>
  
</style>



<body>
    <?php include_once 'C:\xampp\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class="MainBody" id="MainBody">
        <div class="SearchBar" id="SearchBar">
            <form action="SearchPage.php" method="GET">                 
                <input type="text" id="ItemSearch" name="ItemSearch" placeholder="  Search...">
                <input type="hidden" id="page" name="page" value="1">
                <input name="SearchSubmit" type="submit" value="search"  placeholder="Search">                
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