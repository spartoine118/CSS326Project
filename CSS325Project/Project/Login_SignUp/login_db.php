<?php 
session_start();
include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');

    $_SESSION['error'] = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($_SESSION['error'], "Username is required");
        }

        if (empty($password)) {
            array_push($_SESSION['error'], "Password is required");
        }

        if (count($_SESSION['error']) == 0) {

            $password = md5($password);
            $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'; ";
            $work = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($work);

            if (mysqli_num_rows($work) == 1) {
                echo "1";
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Your are now logged in";
                header("location:\CSS325Project\Project\MainPage.php");
            } else {
                array_push($_SESSION['error'], "Wrong Username or Password");
                header("location:\CSS325Project\Project\login.php");
            }
        } else {
            array_push($_SESSION['error'], "Wrong Username or Password");
            header("location:\CSS325Project\Project\login.php");
        }
    }

?>
