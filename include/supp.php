<?php
require_once('DBConnexion.php');

    $supp=$_POST['supp'];
    $conn=DBConnexion::getConnexion();
   $sql="DELETE FROM `postes` WHERE `id`=$supp";
         $conn->query($sql);
       
      



    header('Location:../accueil.php');






?>