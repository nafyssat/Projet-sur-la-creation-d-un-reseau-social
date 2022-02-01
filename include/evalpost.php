<?php 
    //ajoute un nouveau post dans la base de donné;
    require_once('DBConnexion.php');
    $conn=DBConnexion::getconnexion();
    if($_POST['submit']){
        if(isset($_POST['contenu']) && $_POST['contenu'] != ""){
            $userId = $_POST['ID'];
            $contenu=$_POST['contenu'];
          $sql="INSERT INTO postes(utilisateur_id, contenu) VALUES ($userId,'$contenu')";
          $conn->query($sql);

          
        }

    }
    header('Location:../accueil.php');
?>