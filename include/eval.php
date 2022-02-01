<?php
  if(isset($_POST['Connexion'])){
    header('Location:../pagedeConnexion.php');
  }
  elseif (isset($_POST['inscription'])) {
    // code...
    header('Location:../pagedinscription.php');
  }


 ?>
