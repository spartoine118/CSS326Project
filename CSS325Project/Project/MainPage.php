<!DOCTYPE html>
<html lang="en">
<?php require_once 'MainPage/MainPageFunctions.php';
?>
<style>
        body {
        margin: 0%;
        background-color: white;
    }
    
    .header {
        height: 20%;
        min-height: fit-content;
        display: flex;
        flex-wrap: nowrap;
        flex-direction: row;
        justify-content: space-between;
    }
    
    .username {
        margin: 5px;
    }
    
    .username a {
        margin: 5px;
    }
    
    .MainBody {
        height: 80%;
        display: grid;
        gap: 50px;
    }
    
    .SearchBar {
        margin-top: 40px;
        text-align: center;
        align-content: center;
    }
    
    .NewItems {
        margin: 0% 5% 0% 5%;
        display: inline-flex;
        justify-content: flex-start;
        background-color: white;
        border-radius: 20px;
        border: 0.0625rem solid #e0e0e0;
    }
    
    .PopularItems {
        margin: 0% 5% 0% 5%;
        display: inline-flex;
        justify-content: flex-start;
        background-color: white;
        border-radius: 20px;
        border: 0.0625rem solid #e0e0e0;
    }
    
    .SeeMorebtn {
        padding-top: 18%;
        margin-left: 5px;
    }
    
    .NewItemsTest {
        margin: 15px 15px 15px 15px;
        padding: 5px;
        display: grid;
        text-align: right;
        gap: 5px;
        background-color: white;
        border-radius: 20px;
        border: 0.0625rem solid #e0e0e0;
    }
    
    .NewItemsTest a {
        text-align: left;
    }
    
    .MenuSidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: black;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        color:#404EED;
    }
    
    .MenuSidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        color: #404EED;
        display: block;
        transition: 0.3s;
    }
    
    .MenuSidebar a:hover {
        color: #f1f1f1;
    }
    
    .MenuSidebar .closebtn {
        position: absolute;
        top: 0;
        right: 10px;
        margin-top: 1.2%;
        margin-left: 50px;
        font-size: 25px;
        color: #404EED;
    }
    
    .MenuSidebar b {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        color: #404EED;
        display: block;
        transition: 0.3s;
    }
    
    .MenuSidebar b:hover {
        color: red;
    }
    
    input[type="text"] {
        border-radius: 100px;
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
    
    input[type="submit"] {
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSSProject</title>
</head>
<style>
</style>
<body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
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
        </div>
        <div class="PopularItems" id="PopularItems">
            <?php getPopularItems($conn) ?>
        </div>
    </div>
</body>
<script src="MainPage/MainPage.js"></script>

</html>