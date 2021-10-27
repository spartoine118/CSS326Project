<?php 
    include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');
    
    $_SESSION['error'] = array();

    if (isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);

        if (empty($username)) {
            array_push($_SESSION['error'], "Username is required");
        }       
        if (empty($password_1)) {
            array_push($_SESSION['error'], "Password is required");
        }
        if ($password_1 != $password_2) {
            
            array_push($_SESSION['error'], "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM users WHERE username = '".$username."';";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($_SESSION['error'], "Username already exists");              
            }            
        }
        

        if (count($_SESSION['error']) == 0) {
            $password = md5($password_1);
            $sql = "INSERT INTO users (username, password, userPrivilege, firstName, lastName) VALUES ('".$username."', '".$password."', 'User', '".$firstname."', '".$lastname."');";
            mysqli_query($conn, $sql);
            $_SESSION['username'] = $username;
            $file = $_FILES['userImage'];
            $file_name = $file['name'];
            $fileTmpname = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $file_Ext = explode('.',$file_name);
            $fileActualExt = strtolower(end($file_Ext));
            $allowed = array('jpg','jpeg','png');
            $sql2 = "SELECT id FROM users WHERE username = '".$username."';";
            $result2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_assoc($result2);
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 10000000){
                        $fileNameNew = $row['id'].".".$fileActualExt;
                        $fileDestination = 'Uploads/UserImage/'.$fileNameNew;
                        move_uploaded_file($fileTmpname, $fileDestination);
                        $sql3 = "INSERT INTO userimage(userName, userID, status, fileEXT) VALUES ('".$username."', '".$row['id']."', '1', '".$fileActualExt."');";
                        mysqli_query($conn, $sql3);
                    }
                    else{
                        $sql3 = "INSERT INTO userimage(userName, userID, status, fileEXT) VALUES ('".$username."', '".$row['id']."', '0', '".$fileActualExt."');";
                        mysqli_query($conn, $sql3);
                        echo "Your file is too big!";
                    }
                }
                else{
                    $sql3 = "INSERT INTO userimage(userName, userID, status, fileEXT) VALUES ('".$username."', '".$row['id']."', '0', '".$fileActualExt."');";
                    mysqli_query($conn, $sql3);
                    echo "There was an error uploading your file!";
                }
            }
            else{
                $sql3 = "INSERT INTO userimage(userName, userID, status, fileEXT) VALUES ('".$username."', '".$row['id']."', '0', '".$fileActualExt."');";
                mysqli_query($conn, $sql3);
                echo "You cannot upload files of this type!";
                header('location:\CSS325Project\Project\MainPage.php');
            }
            $_SESSION['success'] = "You are now logged in";
            header('location:\CSS325Project\Project\MainPage.php');
        }
        else {
            header('location:\CSS325Project\Project\register.php');
        }
    }

    if(isset($_POST['ModifyUser2'])){
        $header = "location: http://localhost/CSS325Project/Project/ProfilePage.php";
        $ogusername = $_SESSION['username'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
        $uID = mysqli_real_escape_string($conn, $_POST['uID']);

        if (empty($username)) {
            array_push($_SESSION['error'], "Username is required");
            echo "empty username";  
        }       
        if (empty($password_1)) {
            array_push($_SESSION['error'], "Password is required");
            echo "emptypassword";  
        }
        if ($password_1 != $password_2) {
            array_push($_SESSION['error'], "The two passwords do not match");
            echo "passwords dont match";  
        }

        $user_check_query = "SELECT * FROM users WHERE username = '".$username."';";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username and $username <> $ogusername) {
                array_push($_SESSION['error'], "Username already exists");           
            }            
        }
        if (count($_SESSION['error']) == 0) {
            $header = "location: http://localhost/CSS325Project/Project/ProfilePage.php";
            $password = md5($password_1);
            $sql = "UPDATE users SET username = '".$username."',password = '".$password."',firstName = '".$firstname."', lastName = '".$lastname."' WHERE id = ".$_POST['uID'].";";
            mysqli_query($conn, $sql);
            $sql4 = "UPDATE products SET userName = '".$username."' WHERE userName = '".$ogusername."' ;";
            mysqli_query($conn, $sql4);
            $sql5 = "UPDATE messages SET msg_From = '".$username."' WHERE msg_From = '".$ogusername."' ;";
            mysqli_query($conn, $sql5);
            $sql6 = "UPDATE messages SET msg_To = '".$username."' WHERE msg_To = '".$ogusername."' ;";
            mysqli_query($conn, $sql6);
            $_SESSION['username'] = $username;
            if(isset($_FILES['userImage'])){
                $file = $_FILES['userImage'];
                $file_name = $file['name'];
                $fileTmpname = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
    
                $file_Ext = explode('.',$file_name);
                $fileActualExt = strtolower(end($file_Ext));
                $allowed = array('jpg','jpeg','png');
                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0){
                        if($fileSize < 10000000){
                            $fileNameNew = $_POST['uID'].".".$fileActualExt;
                            $newFileDestination = 'Uploads/UserImage/'.$fileNameNew;
                            if(isset($_POST['userImage'])){
                                $fileDestination = 'Uploads/UserImage/'.$_POST['userImage'];
                                unlink($fileDestination);
                                move_uploaded_file($fileTmpname, $newFileDestination);
                                $sql3 = "UPDATE userimage SET userName = '".$username."', status = '1', fileEXT= '".$fileActualExt."' WHERE userID = ".$_POST['uID'].";";
                                mysqli_query($conn, $sql3);
                                header($header);
                            }
                            else{
                                $fileNameNew = $_POST['productID'].".".$fileActualExt;
                                $fileDestination = 'Uploads/ProductsImage/'.$fileNameNew;
                                move_uploaded_file($fileTmpname, $fileDestination);
                                $sql3 = "UPDATE userimage SET userName = '".$username."', status = '1', fileEXT= '".$fileActualExt."' WHERE userID = ".$_POST['uID'].";";
                                mysqli_query($conn, $sql3);
                                header($header); 
                            }
                        }
                        else{
                            $sql3 = "UPDATE userimage SET userName = '".$username."', status = '0', fileEXT= '".$fileActualExt."' WHERE userID = ".$_POST['uID'].";";
                            mysqli_query($conn, $sql3);
                            header($header);
                        }
                    }
                    else{
                        $sql3 = "UPDATE userimage SET userName = '".$username."', status = '0', fileEXT= '".$fileActualExt."' WHERE userID = ".$_POST['uID'].";";
                        mysqli_query($conn, $sql3);
                        header($header);
                    }
                }
                else{
                    if(isset($_POST['userImage'])){
                        $sql3 = "UPDATE userimage SET userName = '".$username."', status = '1' WHERE userID = ".$_POST['uID'].";";
                        mysqli_query($conn, $sql3);
                        header($header);
                    }
                    else{
                        $sql3 = "UPDATE userimage SET userName = '".$username."', status = '0', fileEXT= '".$fileActualExt."' WHERE userID = ".$_POST['uID'].";";
                        mysqli_query($conn, $sql3);
                        header($header);   
                    }
            }
        }
        }
        else {
            header("location: http://localhost/CSS325Project/Project/Register.php");
        }   
    }