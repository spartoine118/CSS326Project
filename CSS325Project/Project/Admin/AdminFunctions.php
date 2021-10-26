<?php
    require_once 'C:\xampp\htdocs\CSS325Project\Project\dbh.php';

function removeItem($conn){
    $sql = "DELETE FROM products WHERE productsID = '".$_POST['productID']."';";
    $sql2 = "DELETE FROM cart WHERE ProductID = '".$_POST['productID']."';";
    $sql3 = "DELETE FROM ratings WHERE productID = '".$_POST['productID']."';";
    $query = mysqli_query($conn,$sql);
    $query = mysqli_query($conn,$sql2);
    $query = mysqli_query($conn,$sql3);
}

function removeComment($conn){
    $sql = "DELETE FROM comments WHERE cID = '".$_POST['commentID']."';";
    echo $sql;
    $query = mysqli_query($conn,$sql);
}


if(isset($_POST['deleteItem'])){
    removeItem($conn);
    header('location:\CSS325Project\Project\MainPage.php');
}

if(isset($_POST['deleteComment'])){
    removeComment($conn);
    $previous = $_SERVER['HTTP_REFERER'];
    header("location: ".$previous);
}