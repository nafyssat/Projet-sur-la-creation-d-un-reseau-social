<?php
    $user=$_POST['pseudo'];
    $mdp=$_POST['motdepasse'];
  
    require_once('../include/DBConnexion.php');

    $conn = DBConnexion::getconnexion();
    $sql="SELECT*from 'admin' where 'pseudo'='$user' AND 'password'='$mdp'";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            header('suuprim.php');
        } else {
            $msg="pseudo ou mot de passe incorrect";
            header('Location:index.php?erreur='.$msg);
        
        }

    ?>