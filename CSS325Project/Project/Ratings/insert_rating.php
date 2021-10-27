<?php
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';


if(isset($_SESSION['username'])){
    if(isset($_POST['rating'])){
        $rating = $_POST['rating'];
        $username = $_SESSION['username'];
        $productID = $_POST['productID'];
        $sql = "SELECT * FROM ratings WHERE userName = '".$username."' AND productID = '".$productID."'; ";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            $sql2 = "UPDATE `ratings` SET `ratingValue` = '".$rating."' WHERE `ratings`.`productID` = ".$productID." AND userName = '".$username."';";
            $query2 = mysqli_query($conn, $sql2); 
            } 
        else{
            $sql2 = "INSERT INTO `ratings` (`productID`, `userName`, `ratingValue`) VALUES ('".$productID."', '".$username."', '".$rating."');";
            $query2 = mysqli_query($conn, $sql2); 

        }
        $sql2 = "SELECT AVG(ratingValue) FROM ratings WHERE productID = '".$productID."';";
        $query2 = mysqli_query($conn, $sql2);
        $result2 = mysqli_fetch_assoc($query2);
        $rating2 = $result2['AVG(ratingValue)'];
        $rating2rnd = round($rating2);
        $sql3 = "UPDATE `products` SET `Rating` = '".$rating2rnd."' WHERE `products`.`productsID` = '".$productID."'";
        $query3 = mysqli_query($conn, $sql3);
        header("Location: http://localhost/CSS325Project/Project/ProductPage.php?name=".$_POST['productname']."&date=".$_POST['productdate']. "&pID=".$productID.""); 
    }
}

