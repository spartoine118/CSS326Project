<?php
    require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

function getUserItems($conn){
    $sql = "SELECT * FROM products WHERE userName = '".$_SESSION['username']."';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $sql3 = "SELECT * FROM  productimage WHERE productName='".$row['productsName']."' AND productID ='".$row['productsID']."';";
            $result3 = mysqli_query($conn,$sql3);
            $queryResults3 = mysqli_num_rows($result3);
            if($queryResults3 > 0){
                while($row3 = mysqli_fetch_assoc($result3)){
                    if($row3['status'] == 1){
                        echo "<div class='itemDisplay' id='itemDisplay'>
                        <form action ='MyproductPage/MyproductPageFunction.php' method='POST'>
                            <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
                            <input type='hidden' name='productID' value='".$row['productsID']."'> 
                        </form> 
                        <form action ='AddproductPage.php' method='POST'>
                        <input class='deleteItem' type='submit' name='ModifyItem' value='Modify this Item'>
                        <input type='hidden' name='productID' value='".$row['productsID']."'>
                        <input type='hidden' name='productDate' value='".$row['productsDate']."'> 
                        <input type='hidden' name='productPicture' value='".$row3['productID'].".".$row3['fileEXT']."'>
                        <input type='hidden' name='productName' value='".$row['productsName']."'> 
                        <input type='hidden' name='productPrice' value='".$row['productsPrice']."'> 
                        <input type='hidden' name='productDetail' value='".$row['productsDetail']."'> 
                    </form> 
                        <img src='AddProductPage/Uploads/ProductsImage/".$row3['productID'].".".$row3['fileEXT']."' alt='picture of product' width='256' height='256'>
                        <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                        . $row['productsPrice'] . "$ </br>
                        </div>";
                    }
                    else{
                        echo "<div class='itemDisplay' id='itemDisplay'>
                        <form action ='MyproductPage/MyproductPageFunction.php' method='POST'>
                            <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
                            <input type='hidden' name='productID' value='".$row['productsID']."'> 
                        </form>
                        <form action ='AddproductPage.php' method='POST'>
                            <input class='deleteItem' type='submit' name='ModifyItem' value='Modify this Item'>
                            <input type='hidden' name='productID' value='".$row['productsID']."'>
                            <input type='hidden' name='productDate' value='".$row['productsDate']."'> 
                            <input type='hidden' name='productName' value='".$row['productsName']."'> 
                            <input type='hidden' name='productPrice' value='".$row['productsPrice']."'> 
                            <input type='hidden' name='productDetail' value='".$row['productsDetail']."'> 
                        </form> 
                        <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                        <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                        . $row['productsPrice'] . "$ </br>
                        </div>";
                    }
                } 
            }
            else{
                echo "<div class='itemDisplay' id='itemDisplay'>
                    <form action ='MyproductPage.php' method='POST'>
                            <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
                            <input type='hidden' name='productID' value='".$row['productsID']."'> 
                        </form> 
                    <form action ='AddproductPage.php' method='POST'>
                        <input class='deleteItem' type='submit' name='ModifyItem' value='Modify this Item'>
                        <input type='hidden' name='productID' value='".$row['productsID']."'> 
                        <input type='hidden' name='productDate' value='".$row['productsDate']."'> 
                        <input type='hidden' name='productName' value='".$row['productsName']."'> 
                        <input type='hidden' name='productPrice' value='".$row['productsPrice']."'> 
                        <input type='hidden' name='productDetail' value='".$row['productsDetail']."'> 
                    </form> 
                <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>
                </div>";    
            } 
            }
        }
    }

function getTotalPrice($conn){
    $sql = "SELECT SUM(p.productsPrice) FROM cart c,products p WHERE c.Username = 'Antoine' AND c.Productname = p.productsName;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo 'Total Price: ';
            echo $row['SUM(p.productsPrice)'];
            echo "$";
        }
    }
}

function removeItem($conn,$productid){
    $sql = "DELETE FROM products WHERE userName = '".$_SESSION['username']."' AND productsID = ".$productid.";";
    $sql1 = "DELETE FROM cart WHERE productID = ".$productid.";";
    $sql2 = "DELETE FROM comments WHERE productID = ".$productid.";";
    $sql5 = "SELECT * FROM productimage WHERE productID = ".$productid.";";
    $result5 = mysqli_query($conn, $sql5);
    $row = mysqli_fetch_assoc($result5);
    $fileDestination = "Uploads/ProductsImage/".$row['productID'].".".$row['fileEXT']."";
    $realdestination = $_SERVER['DOCUMENT_ROOT'] ."/CSS325Project/Project/AddProductPage/".$fileDestination;
    unlink($realdestination);
    $sql3 = "DELETE FROM productimage WHERE productID = ".$productid.";";
    $sql4 = "DELETE FROM ratings WHERE productID = ".$productid.";";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    $result4 = mysqli_query($conn, $sql4);
}

if(isset($_POST['deleteItem'])){
    removeItem($conn,$_POST['productID']);
    header("location: http://localhost/CSS325Project/Project/MyproductPage.php");
}