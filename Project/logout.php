<?php session_start();
session_unset();
session_destroy();

header("Location: http://localhost/CSS325Project/Project/MainPage.php");
exit();