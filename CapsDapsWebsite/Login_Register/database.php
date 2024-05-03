<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "loginCaps&Daps";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if(!$conn){
    die("Could not connect to database");
}
?>