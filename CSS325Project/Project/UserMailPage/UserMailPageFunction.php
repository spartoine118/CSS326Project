<?php

include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');

function getUserMail($conn){
    $sql = "SELECT * FROM messages WHERE msg_To = '".$_SESSION['username']."'";
    $result = mysqli_query($conn,$sql);     
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        if($result != null){
            while($row = mysqli_fetch_assoc($result)){
                echo "
                <div class='commentDisplay' id='commentDisplay'>
                    <div class='comments' id='comments'>
                    <a href='Mail.php?uname=".$_SESSION['username']."&date=".$row['msg_date']."&mID=".$row['mID']."'>".$row['msg_subject']."</a>".$row['msg_From']."</br>".$row['msg_date']."</br>".substr($row['msg_body'],0,100)."...</br>
                    </div>
                </div>";   
            }
        }
    }
}

function getMail($conn){
    $sql = "SELECT * FROM messages WHERE msg_date = '".$_GET['date']."' AND '".$_GET['mID']."'";
    $result = mysqli_query($conn,$sql);     
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        if($result != null){
            while($row = mysqli_fetch_assoc($result)){
                echo "
                <div class='commentDisplay' id='commentDisplay'>
                    <div class='comments' id='comments'>
                    ".$row['msg_subject']."</br>".$row['msg_From']."</br>".$row['msg_date']."</br>".$row['msg_body']."   </br>
                    </div>
                </div>";   
            }
        }
    }
}