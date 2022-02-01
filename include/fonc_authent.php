<?php

function login_valid($user,$mdp){
  
 require_once('DBConnexion.php');
    $conn=DBConnexion::getconnexion();
    $pseudo = md5($user);
    $pass = md5($mdp);
    $sql = "SELECT * FROM utilisateur where userhash = '$pseudo' AND motdepasse = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        setcookie('userhash', $pseudo, time() + (60 * 60 * 24 * 7), "/");
        return true;
    } else {
        setcookie('userhash', '', time(), "/");
        return false;
    }
}
function tenter_login($user,$mdp){
    
    if(isset($user)&& login_valid($user,$mdp) && !isset($_SESSION["user"])){
        $_SESSION["user"]= $user;
    }
}

function auth(){
    if(isset($_COOKIE['userhash']) && $_COOKIE['userhash'] != '') {
        return $_COOKIE['userhash'];
    }
    header('Location:pagedeconnexion.php');
}

function bloquer_sans_session($user){
    if (!isset($_SESSION["user"])){
        $message="oups! email ou mot de passe incorrect";
        header('Location:../pagedeconnexion.php?message='.$message);
        exit;
    }
}
?>
