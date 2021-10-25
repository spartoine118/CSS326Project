<?php 
    include('C:\xampp\htdocs\CSS325Project\Project\dbh.php');
    
    $_SESSION['error'] = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

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
            echo "1";

            $sql = "INSERT INTO users (username, password, userPrivilege) VALUES ('".$username."', '".$password."', 'User');";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location:\CSS325Project\Project\MainPage.php');
        } else {
            header('location:\CSS325Project\Project\register.php');
        }
    }

?>
