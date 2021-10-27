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
<style>
    body {
    margin: 0%;
}

.header {
    height: 20%;
    min-height: fit-content;
    background-color: red;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    justify-content: space-between;
}

.sidebarbtn {
    margin: 5px;
}

.username {
    margin: 5px;
}

.username a {
    margin: 5px;
}

.SearchBar {
    margin-top: 10px;
    text-align: center;
    align-content: center;
}

.MenuSidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.MenuSidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.MenuSidebar a:hover {
    color: #f1f1f1;
}

.MenuSidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 25px;
    margin-left: 50px;
}

.MainBody {
    height: 80%;
    display: grid;
    gap: 50px;
}

.SearchBar {
    margin-top: 20px;
    text-align: center;
    align-content: center;
}

.cartDisplay {
   height:100%;
    width: 20%;
    margin: 0% 5% 0% 5%;
    display: grid;
    justify-self: center;
    border: 0.0625rem solid #e0e0e0;
    border-radius:5px;
   text-align:center;
    color:#404EED; 
    padding-bottom:30px;   
    padding-top:10px;     
    
}

.itemDisplay {
    margin: 5px 0px 5px 5px;
    padding: 5px;
    border: red solid 5px;
    display: grid;
    text-align: right;
    gap: 5px;
}

.itemDisplay img {
    justify-self: center;
}

input[type="text"]{ border-radius: 100px;
        cursor: text;
        font-size: 16px;
        max-width: 480px;
        min-height: 40px;
        min-width: 0px;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        border: 0.0625rem solid #e0e0e0;
}



input[type="submit"]{
    align-items: center;
        background-color: #F6F6F6;
        border: 0;
        border-radius: 100px;
        box-sizing: border-box;
        color: #7289da;
        cursor: pointer;
        display: inline-flex;
        /*font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;*/
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 20px;
        max-width: 480px;
        min-height: 40px;
        min-width: 0px;
        overflow: hidden;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        text-align: center;
        touch-action: manipulation;
        transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
}

</style>


<body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class ="SearchBody" id="SearchBody">
    <div class="MenuSidebar" id="MenuSideBar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <div class="MainBody" id="MainBody">
    <div class="SearchBar" id="SearchBar">
            <form action="SearchPage.php" method="GET">
                
                <input type="text" id="ItemSearch" name="ItemSearch">
                <input name="SearchSubmit" type="submit" value="search">
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