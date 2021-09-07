<?php

 require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

 $_SESSION['error'] = array();

if (isset($_POST['reg_user'])) {
    $productsName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productsPrice = mysqli_real_escape_string($conn, $_POST['productsPrice']);
    $productsDetail = mysqli_real_escape_string($conn, $_POST['productsDetail']);
    $productsDate = date('Y-m-d');
        if (empty($productsName)) {
            array_push($_SESSION['error'], "Product name is empty");
        }       
        if (empty($productsPrice)) {
            array_push($_SESSION['error'], "Price is required");
        }
        if (count($_SESSION['error']) == 0) {
            $sql = "INSERT INTO products (productsName, productsPrice, productsDetail, productsDate, userName) VALUES ('".$productsName."', '".$productsPrice."', '".$productsDetail."', '".$productsDate."', '".$_SESSION['username']."');";
            echo $sql;
            mysqli_query($conn, $sql);
            $header = "location:\CSS325Project\Project\ProductPage.php?name=" .$productsName. "&date=" .$productsDate;
            header($header);
        }
        else{
            header("location:\CSS325Project\Project\AddProductPage.php");
        }
    }
