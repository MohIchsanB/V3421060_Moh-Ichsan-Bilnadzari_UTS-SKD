<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "uts_skd";

$conn = mysqli_connect($server, $user, $pass, $database);
if(!$conn){
    die("<script>alert('Gagal tersambung dengan databse!')</script>");
}



?>