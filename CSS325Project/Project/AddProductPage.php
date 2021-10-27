<!DOCTYPE html>
<html lang="en">
<?php include ('AddProductPage/AddProductPageFunction.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CSSProject</title>    
</head>
<style>
    .header {
        height: 19.8%;
    min-height: fit-content;
    background-color: white;
    border-bottom: 0.0625rem solid #e0e0e0;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    justify-content: space-between;
    padding-bottom: 0.5%;
    -webkit-box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    box-shadow: -1px 1px 11px 0px rgba(0, 0, 0, 0.37);
    margin-top: 0%;
}

.productInputs {
    text-align: left;
    margin-left: 35%;
}

.input button {
    margin-left: 20%;
}

input {
    margin: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 20px;
    padding: 4px 7px;
    outline: 0;
    display: inline-block;
    width: 150px;
    text-align: right;
}

label {
    text-align: right;
    padding-right: 20px;
    display: inline-block;
    min-width: 150px;
    color: #404EED;
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

.MenuSidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
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
</style>
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