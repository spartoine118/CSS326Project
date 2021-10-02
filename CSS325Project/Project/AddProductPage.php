<!DOCTYPE html>
<html lang="en">
<?php require_once 'AddProductPage/AddProductPageFunction.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AddProductPage/AddProductPage.css">
    <title>CSSProject</title>    
</head>

<body>
    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; 
    echo $_SESSION['username'];?>
    <div class="productInputs">
        <?php 
            if(isset($_SESSION['error'])){
                foreach($_SESSION['error'] as $errors){
                    echo $errors. "<br>";
                    echo "abc";
                    }
                unset($_SESSION['error']);
                }
        ?>
        <form action = "AddProductPage\AddProductPageFunction.php" method='POST'>
            <div class = "input">
                <label for = "productName">Name of product</label>
                <input type = "text" name="productName" >
            </div>
            <div class = "input">
                <label for = "productsPrice">Price</label>
                <input type = "text" name="productsPrice">
            </div>  
            <div class = "input">
                <label for = "productsDetail">Details</label>
                <textarea name="productsDetail" rows="4" cols="50" placeholder="description of item"></textarea>
            </div>  
            <div class = "input">
                <button type="submit" name = "reg_user" class="btn">Add Item</button>
            </div>
        </form>
    </div>
</body>
<script src="AddProductPage/AddProductPage.js"></script>

</html>