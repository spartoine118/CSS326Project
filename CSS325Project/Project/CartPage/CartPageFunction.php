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
                echo "<div class='itemDisplay' id='itemDisplay'>
                <img width='256' height='256'>
                <a href='ProductPage.php?name=".$row2['productsName']."&date=".$row2['productsDate']. "&pID=".$row2['productsID']."'>" . $row2['productsName'] . " </a>"
                . $row2['productsPrice'] . "$ </br>
                Quantity:".$row['Amount']."
                </div>";
                }
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
