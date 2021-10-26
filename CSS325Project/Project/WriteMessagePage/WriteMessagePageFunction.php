<?php

include('C:\xampp\htdocs\CSS325Project\Project\dbh.php');


if(isset($_POST['msg_submit'])){

    if (empty($_POST['msgTo'])) {
        array_push($_SESSION['error'], "Insert a receiver");
    }       
    if (empty($_POST['msgSubject'])) {
        array_push($_SESSION['error'], "Write a subject for this message");
    }
    if (empty($_POST['msgBody'])) {
        array_push($_SESSION['error'], "Write your message");
    }
    if (count($_SESSION['error']) == 0) {
        $sql = "INSERT INTO messages (msg_From, msg_To, msg_subject, msg_body, msg_read, msg_hidden, msg_date) VALUES ('".$_SESSION['username']."', '".$_POST['msgTo']."', '".$_POST['msgSubject']."', '".$_POST['msgBody']."', '0', '0', '".date('Y-m-d H:i:s')."');";
        mysqli_query($conn, $sql);
        header("location:\CSS325Project\Project\MainPage.php");
    }
    else{
        header("location: http://localhost/CSS325Project/Project/WriteMessage.php");
    }
}