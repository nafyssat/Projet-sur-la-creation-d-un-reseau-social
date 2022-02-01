<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once('DBConnexion.php');
    
    $conn = DBConnexion::getConnexion();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $mdp = mysqli_real_escape_string($conn, $_POST["motdepasse"]);
    $mdp = md5($mdp);
    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
    $pseudo = mysqli_real_escape_string($conn, $_POST["pseudo"]);
    $sexe = mysqli_real_escape_string($conn, $_POST["sexe"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $userHash = md5($pseudo);
    echo "bonjour";
    $values = "VALUES ('$userHash','$nom', '$prenom', '$pseudo', '$sexe', '".$_POST["datedenaissance"]."', '$email', '$mdp')";
    //$sql = 'INSERT INTO utilisateur(nom, prenom, pseudo, genre, datedenaissance, email, motdepasse) VALUES(\''.$_POST["email"].'\' and motdepasse =\''. $_POST["motdepasse"].'\'';
    $sql = 'INSERT INTO utilisateur(userhash, nom, prenom, pseudo, sexe, datedenaissance, email, motdepasse) '.$values;
    $querycat = "INSERT INTO categories(user,cat1,cat2,cat3) VALUES ('$pseudo','NonCours','NonLoisir','NonNourriture')";
    $conn->query($querycat) or die($conn->error);
    

     if ($conn->query($sql) == TRUE) {
      
          header('Location:../pagedacceuill.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $message="oups!on a pas pu creer votre compte";
        header('Location:./pagedinscription.php?message='.$message);

      }


    $conn->close();



    ?>

  </body>
</html>
