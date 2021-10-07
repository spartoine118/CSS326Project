<?php 
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

if(isset($_POST['AddToCart'])){
    $sql = "INSERT INTO cart (Username, Productname, ProductID) VALUES ('".$_SESSION['username']."', '".$_POST['productname']."', '".$_POST['productID']."');";
    $query = mysqli_query($conn, $sql);
    header("Location: http://localhost/CSS325Project/Project/ProductPage.php?name=".$_POST['productname']."&date=".$_POST['productdate']. "&pID=".$_POST['productID'].""); 
}

function setComment($conn){
    if(isset($_POST['commentSubmit'])){
        $username = $_POST['username'];
        $productname = $_POST['productname'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
        $productID = $_POST['productID'];
        $sql = "INSERT INTO comments (userName, productName, date, comment, productID) VALUES ('$username', '$productname', '$date', '$comment',$productID);";
        $result = mysqli_query($conn,$sql);  
    }
}

function getComment($conn,$productname){
    $sql = "SELECT * FROM comments WHERE productName = '".$productname."'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        if($result != null){
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='comments' id='comments'>
                ".$row['userName']."</br>".$row['date']."</br>".$row['comment']."</br>
                </div>";
                if($_SESSION['userPrivilege'] == 'Admin'){
                    echo "<form action = 'Admin\AdminFunctions.php' method='POST'>
                        <input class='deleteComment' type='submit' name='deleteComment' value='Remove this comment'>
                        <input type='hidden' name='commentID' value='".$row['cID']."'> 
                        </form>";
                }
            }
        }
    }
}