<?php
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

function getNewItems($conn){
    $sql = "SELECT * FROM products ORDER BY productsDate DESC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        for ($x = 0; $x <= 4; $x++){
            if($row = mysqli_fetch_assoc($result)){
                $sql2 = "SELECT * FROM  productimage WHERE productName='".$row['productsName']."' AND productID ='".$row['productsID']."'";
                $result2 = mysqli_query($conn,$sql2);
                $queryResults2 = mysqli_num_rows($result2);
                if($queryResults2 > 0){
                    while($row2 = mysqli_fetch_assoc($result2)){
                        if($row2['status'] == 1){
                            echo "<div class='NewItemsTest' id='NewItemsTest'>
                            <img src='AddProductPage/Uploads/ProductsImage/".$row2['productName']."_".$row2['productID'].".".$row2['fileEXT']."' alt='picture of product' width='256' height='256'>
                            <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                            . $row['productsPrice'] . "$
                            </div>";
                        }
                        else{
                            echo "<div class='NewItemsTest' id='NewItemsTest'>
                            <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                            <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                            . $row['productsPrice'] . "$
                            </div>";
                        }
                    } 
                } 
                else{
                    echo "<div class='NewItemsTest' id='NewItemsTest'>
                    <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                    <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                    . $row['productsPrice'] . "$
                    </div>";
                        } 
            }
        }
    }
} 

function getPopularItems($conn){
    $sql = "SELECT * FROM products ORDER BY Rating DESC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        for ($x = 0; $x <= 4; $x++){
            if($row = mysqli_fetch_assoc($result)){
                $sql2 = "SELECT * FROM  productimage WHERE productName='".$row['productsName']."' AND productID ='".$row['productsID']."'";
                $result2 = mysqli_query($conn,$sql2);
                $queryResults2 = mysqli_num_rows($result2);
                if($queryResults2 > 0){
                    while($row2 = mysqli_fetch_assoc($result2)){
                        if($row2['status'] == 1){
                            echo "<div class='NewItemsTest' id='NewItemsTest'>
                            <img src='AddProductPage/Uploads/ProductsImage/".$row2['productName']."_".$row2['productID'].".".$row2['fileEXT']."' alt='picture of product' width='256' height='256'>
                            <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                            . $row['productsPrice'] . "$
                            </div>";
                        }
                        else{
                            echo "<div class='NewItemsTest' id='NewItemsTest'>
                            <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                            <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                            . $row['productsPrice'] . "$
                            </div>";
                        }
                    } 
                } 
                else{
                    echo "<div class='NewItemsTest' id='NewItemsTest'>
                    <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                    <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                    . $row['productsPrice'] . "$
                    </div>";
                        } 
            }
        }
    }
}  



