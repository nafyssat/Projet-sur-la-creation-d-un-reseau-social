<?php 
    require_once('DBConnexion.php');

    $conn = DBConnexion::getconnexion();

    $utilisateurId = $_POST['utilisateur-id'];
    $followedId = $_POST['followed-id'];

    echo $utilisateurId . ' ' . $followedId;

    if(isset($_POST['follow'])){
        $sql = 'INSERT INTO followers(utilisateur_id, followed_id) VALUES ('.$utilisateurId.', '.$followedId.')';        
    }

    if(isset($_POST['unfollow'])){
        $sql = 'DELETE FROM followers WHERE utilisateur_id = '.$utilisateurId.' and followed_id = '.$followedId.'';
    }

    $conn->query($sql);

    header('Location:' . $_SERVER['HTTP_REFERER']);
?>