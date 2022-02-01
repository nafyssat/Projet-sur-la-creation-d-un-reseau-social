<?php
require_once("fonc_authent.php");
require_once('DBConnexion.php');
    $conn=DBConnexion::getconnexion();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user = mysqli_real_escape_string($conn, $_SESSION["user"]);
$user = md5($user);
function afficher_profil($user){
    header('Location:../accueil.php');
}

function afficher_page_deconnection($user){
    header('Location:./deconnection.php');
}
?>
