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
<style>
    *{
        margin:0;
    }
    .header {
  height: 20%;
  min-height: fit-content;
  background-color: red;
  display: flex;
  flex-wrap: nowrap;
  flex-direction: row;
  justify-content: space-between;
}

.sidebarbtn {
  margin: 5px;
}

.username {
  margin: 5px;
}

.username a {
  margin: 5px;
}

.SearchBar {
  margin-top: 10px;
  text-align: center;
  align-content: center;
}

.MenuSidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.MenuSidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.MenuSidebar a:hover {
  color: #f1f1f1;
}

.MenuSidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 25px;
  margin-left: 50px;
}

.productInputs {
  text-align: left;
  margin-top:5%;
  margin-left: 35%;
  margin-right: 35%;
  border: 0.0625rem solid #e0e0e0;
  border-radius:20px;
  padding-left:10px;
  padding-right:10px;
  padding-top:10px;
  padding-bottom:60px; 
 
}

input {
  margin: 10px;
  font-size: 15px;
  padding: 4px 7px;
  display: inline-block;
  width: 150px;
  text-align: left;
  color:#5865F2;
}

label {
  text-align: left;
  padding-right: 20px;
  display: inline-block;
  min-width: 100px;
}

textarea {
        border-radius: 20px;
        cursor: text;
        font-size: 16px;
        max-width: 480px;
        min-height: 40px;
        min-width: 0px;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        border: 0.0625rem solid #e0e0e0;
}

h1{
    color:#404EED;
    text-align:center;
    padding-bottom:20px;
}

input[type="text"]{
        border-radius: 100px;
        cursor: text;
        font-size: 16px;
        max-width: 480px;
        min-height: 40px;
        min-width: 0px;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        border: 0.0625rem solid #e0e0e0;
    }

input[type="submit"] {
        align-items: center;
        background-color: #F6F6F6;
        border: 0;
        border-radius: 100px;
        box-sizing: border-box;
        color: #7289da;
        cursor: pointer;
        display: inline-flex;
        /*font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;*/
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 20px;
        max-width: 480px;
        min-height: 40px;
        min-width: 0px;
        overflow: hidden;
        padding: 0px;
        padding-left: 20px;
        padding-right: 20px;
        text-align: center;
        touch-action: manipulation;
        transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: middle;
        
    }

</style>
<body>

    <?php include_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\Header.php'; ?>
    <div class="productInputs">
        <form action ="WriteMessagePage\WriteMessagePageFunction.php" method='POST' enctype='multipart/form-data'>
        <h1>Send Your message</h2>
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
                <textarea name="msgBody" rows="4" cols="50" placeholder="Message..."></textarea>
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