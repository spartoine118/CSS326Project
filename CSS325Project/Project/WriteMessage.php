<!DOCTYPE html>
<html lang="en">
<?php include ('AddProductPage/AddProductPageFunction.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="WriteMessagePage/WriteMessagePage.css">
    <title>CSSProject</title>    
</head>

<body>

    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class="productInputs">
        <form action ="WriteMessagePage\WriteMessagePageFunction.php" method='POST' enctype='multipart/form-data'>
            <div class = "input">
                <label for = "msgTo">To</label>
                <input type = "text" name="msgTo" value="<?php if(isset($_POST['replyMail'])){echo $_POST['messageSender'];}?>">
            </div>
            <div class = "input">
                <label for = "msgSubject">Subject</label>
                <input type = "text" name="msgSubject" value="<?php if(isset($_POST['replyMail'])){echo $_POST['messageSubject'];}?>">
            </div>  
            <div class = "input">
                <label for = "msgBody">Details</label>
                <textarea name="msgBody" rows="4" cols="50" placeholder="Message"></textarea>
            </div>
            <div class = "input">
                <button type="submit" name = "msg_submit" class="btn">Send message</button>
            </div>
        </form>
        <?php
            if(isset($_SESSION['error'])){
                foreach($_SESSION['error'] as $errors){
                    echo $errors. "<br>";
                    }
                unset($_SESSION['error']);
                $_SESSION['error'] = array();
                }
                
        ?>
    </div>
</body>
<script src="WriteMessagePage/WriteMessagePage.js"></script>

</html>