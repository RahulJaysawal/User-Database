<?php
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "user";
$conn = mysqli_connect($server , $username ,$password ,$database);
if(!$conn){
    die("Error" . mysqli_connect_error());
}
?>