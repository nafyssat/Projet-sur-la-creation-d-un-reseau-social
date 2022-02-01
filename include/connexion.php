<?php
session_start();
require_once("fonc_sortie.php");
require_once("fonc_authent.php");
require_once("DBConnexion.php");

$user = mysqli_real_escape_string(DBConnexion::getconnexion(), $_POST["pseudo"]);
$mdp = mysqli_real_escape_string(DBConnexion::getconnexion(), $_POST["motdepasse"]);

tenter_login($user,$mdp);
bloquer_sans_session($user);
afficher_profil($_SESSION['user']);

?>
