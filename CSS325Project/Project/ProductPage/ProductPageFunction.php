<?php 
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

if(isset($_POST['AddToCart'])){
    $sql = "INSERT INTO cart (Username, Productname, ProductID) VALUES ('".$_SESSION['username']."', '".$_POST['productname']."', '".$_POST['productID']."');";
    $query = mysqli_query($conn, $sql);
    header("Location: http://localhost/CSS325Project/Project/ProductPage.php?name=".$_POST['productname']."&date=".$_POST['productdate']. "&pID=".$_POST['productID'].""); 
}