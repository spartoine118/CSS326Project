<!DOCTYPE html>
<html lang="en">
<?php include ('AddProductPage/AddProductPageFunction.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AddProductPage/AddProductPage.css">
    <title>CSSProject</title>    
</head>

<body>

    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class="productInputs">
        <form action ="AddProductPage\AddProductPageFunction.php" method='POST' enctype='multipart/form-data'>
            <div class = "input">
                <label for = "productName">Name of product</label>
                <input type = "text" name="productName" value="<?php if(isset($_POST['ModifyItem'])){echo $_POST['productName'];}?>" >
            </div>
            <div class = "input">
                <label for = "productsPrice">Price</label>
                <input type = "text" name="productsPrice" value="<?php if(isset($_POST['ModifyItem'])){echo $_POST['productPrice'];}?>">
            </div>  
            <div class = "input">
                <label for = "productsDetail">Details</label>
                <textarea name="productsDetail" rows="4" cols="50" placeholder="description of item"><?php if(isset($_POST['ModifyItem'])){echo $_POST['productDetail'];}?></textarea>
            </div>
            <div class = "input">
                <label for = "productsImage">Upload an Image</label>
                <input type='file' name='productImage'>Select File</input>
            </div>
            <div class = "input">
                <?php if(isset($_POST['ModifyItem'])){echo "<button type='submit' name = 'ModifyItem2' class='btn'>Modify Item</button> 
                <input type='hidden' name='productID' value='".$_POST['productID']."'>
                <input type='hidden' name='productDate' value='".$_POST['productDate']."'>";
                if(isset($_POST['productPicture'])){
                    echo "<input type='hidden' name='productPicture' value='".$_POST['productPicture']."'> ";
                }
                }
                else{
                    echo '<button type="submit" name = "reg_user" class="btn">Add Item</button>';
                }?>
            </div>
        </form>
        <?php
            if(isset($_SESSION['error'])){
                foreach($_SESSION['error'] as $errors){
                    echo $errors. "<br>";
                    }
                unset($_SESSION['error']);
                $_SESSION['error'] = array();
                }
                
        ?>
    </div>
</body>
<script src="AddProductPage/AddProductPage.js"></script>

</html>