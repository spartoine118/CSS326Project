<?php
    require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

function getCartItems($conn){
    $sql = "SELECT Productname, ProductID, COUNT(*) AS Amount FROM cart WHERE Username = '".$_SESSION['username']."' GROUP BY Productname;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $sql2 = "SELECT * FROM products WHERE productsID = '".$row['ProductID']."' AND productsName = '".$row['Productname']."';";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2= mysqli_num_rows($result2);
            if($resultCheck2 > 0){
                while($row2 = mysqli_fetch_assoc($result2)){
                    $sql3 = "SELECT * FROM  productimage WHERE productName='".$row['Productname']."' AND productID ='".$row['ProductID']."';";
                    $result3 = mysqli_query($conn,$sql3);
                    $queryResults3 = mysqli_num_rows($result3);
                    if($queryResults3 > 0){
                        while($row3 = mysqli_fetch_assoc($result3)){
                            if($row3['status'] == 1){
                                echo "<div class='itemDisplay' id='itemDisplay'>
                                <form action = 'CartPage/CartPageFunction.php' method='POST'>
                                    <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
                                    <input type='hidden' name='productID' value='".$row2['productsID']."'> 
                                </form> 
                                <img src='AddProductPage/Uploads/ProductsImage/".$row3['productName']."_".$row3['productID'].".".$row3['fileEXT']."' alt='picture of product' width='256' height='256'>
                                <a href='ProductPage.php?name=".$row2['productsName']."&date=".$row2['productsDate']. "&pID=".$row2['productsID']."'>" . $row2['productsName'] . " </a>"
                                . $row2['productsPrice'] . "$ </br>
                                Quantity:".$row['Amount']."
                                </div>";
                            }
                            else{
                                echo "<div class='itemDisplay' id='itemDisplay'>
                                <form action = 'CartPage/CartPageFunction.php' method='POST'>
                                    <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
                                    <input type='hidden' name='productID' value='".$row2['productsID']."'> 
                                </form> 
                                <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                                <a href='ProductPage.php?name=".$row2['productsName']."&date=".$row2['productsDate']. "&pID=".$row2['productsID']."'>" . $row2['productsName'] . " </a>"
                                . $row2['productsPrice'] . "$ </br>
                                Quantity:".$row['Amount']."
                                </div>";
                            }
                        } 
                    }
                    else{
                        echo "<div class='itemDisplay' id='itemDisplay'>
                        <form action ='CartPage/CartPageFunction.php' method='POST'>
                            <input class='deleteItem' type='submit' name='deleteItem' value='Remove this Item'>
                            <input type='hidden' name='productID' value='".$row2['productsID']."'> 
                        </form> 
                        <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                        <a href='ProductPage.php?name=".$row2['productsName']."&date=".$row2['productsDate']. "&pID=".$row2['productsID']."'>" . $row2['productsName'] . " </a>"
                        . $row2['productsPrice'] . "$ </br>
                        Quantity:".$row['Amount']."
                        </div>";
                    } 
                }
            }
        }
    }
}

function removeItem($conn,$productid){
    $sql = "DELETE FROM cart WHERE Username = '".$_SESSION['username']."' AND productID = ".$productid." LIMIT 1;";
    echo $sql;
    $result = mysqli_query($conn, $sql);
}



function getTotalPrice($conn){
    $sql = "SELECT SUM(p.productsPrice) FROM cart c,products p WHERE c.Username = '".$_SESSION['username']."' AND c.Productname = p.productsName AND p.productsID = c.ProductID;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['SUM(p.productsPrice)'] == null){
                echo "Empty cart";
            }
            else{
                echo 'Total Price: ';
                echo $row['SUM(p.productsPrice)'];
                echo "$";
            }
        }
    }
}

if(isset($_POST['deleteItem'])){
    removeItem($conn,$_POST['productID']);
    header("location: http://localhost/CSS325Project/Project/CartPage.php");
}