<?php
    require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

function getUserItems($conn){
    $sql = "SELECT * FROM products WHERE userName = '".$_GET['uname']."';";
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
                        <img src='AddProductPage/Uploads/ProductsImage/".$row3['productID'].".".$row3['fileEXT']."' width='256' height='256'>
                        <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                        . $row['productsPrice'] . "$ </br>
                        </div>";
                    }
                    else{
                        echo "<div class='itemDisplay' id='itemDisplay'>
                        <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                        <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                        . $row['productsPrice'] . "$ </br>
                        </div>";
                    }
                } 
            }
            else{
                echo "<div class='itemDisplay' id='itemDisplay'>
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
