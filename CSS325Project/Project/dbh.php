<?php

$servername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbname ="project1DB";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}