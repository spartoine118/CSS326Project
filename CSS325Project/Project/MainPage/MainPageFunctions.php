<?php
 session_start();
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

function getNewItems($conn){
    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        for ($x = 0; $x <= 4; $x++){
            if($row = mysqli_fetch_assoc($result)){
                echo "<div class='NewItemsTest' id='NewItemsTest'>
                <img width='256' height='256'>
                <a href='#'>" . $row['productsName'] . "</a>"
                . $row['productsPrice'] . "
                </div>";
                }
            }
        }
    }

function displayNewItem(){
    echo "<div class='NewItemsTest' id='NewItemsTest'>
    <img width='256' height='256'>
    <a href='#'></a>
    Price
    </div>";
}
