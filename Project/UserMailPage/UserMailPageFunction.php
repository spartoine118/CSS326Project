<?php

include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');

function getUserMail($conn){
    $sql = "SELECT * FROM messages WHERE msg_To = '".$_SESSION['username']."'";
    $result = mysqli_query($conn,$sql);     
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        if($result != null){
            while($row = mysqli_fetch_assoc($result)){
                if($row['msg_hidden'] == 0){
                    echo "
                    <div class='commentDisplay' id='commentDisplay'>
                        <div class='comments' id='comments'>
                        <form action ='UserMailPage/UserMailPageFunction.php' method='POST'>
                            <input class='deleteItem' type='submit' name='deleteMail' value='Delete this Mail'>
                            <input type='hidden' name='messageID' value='".$row['mID']."'> 
                        </form> 
                        <a href='Mail.php?uname=".$_SESSION['username']."&date=".$row['msg_date']."&mID=".$row['mID']."'>".$row['msg_subject']."</a>".$row['msg_From']."</br>".$row['msg_date']."</br>".substr($row['msg_body'],0,100)."...</br>
                        </div>
                    </div>";  
                } 
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
                    <form action ='WriteMessage.php' method='POST'>
                        <input class='deleteItem' type='submit' name='replyMail' value='Reply'>
                        <input type='hidden' name='messageSender' value='".$row['msg_From']."'> 
                        <input type='hidden' name='messageSubject' value='".$row['msg_subject']."'> 
                    </form> 
                    ".$row['msg_subject']."</br>".$row['msg_From']."</br>".$row['msg_date']."</br>".$row['msg_body']."  </br>
                    </div>
                </div>";   
            }
        }
    }
}

if(isset($_POST['deleteMail'])){
    $sql = "UPDATE messages SET msg_hidden = '1' WHERE mID = ".$_POST['messageID'].";";
    $result = mysqli_query($conn,$sql); 
    header("location: http://localhost/CSS325Project/Project/UserMail.php");
}