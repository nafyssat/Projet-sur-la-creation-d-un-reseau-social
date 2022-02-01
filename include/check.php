<?php
require_once("fonc_authent.php");
session_start();
bloquer_sans_session($_SESSION["user"]); 
$servername = "localhost";
$database = "facechat";
$username = "root";
$password = "";
    
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user= $_SESSION['user'];
$sessionuser = md5($_SESSION["user"]);
?>