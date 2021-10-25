<?php
session_start();

$servername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbname ="project1db_1";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbname);

if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}