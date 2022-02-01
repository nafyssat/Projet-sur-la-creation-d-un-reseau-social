<?php
require_once("include/fonc_authent.php");
require_once("include/utilisateurInfo.php");
$userHash = auth();
$userConnecte = getUser($userHash);
require_once("include/DBConnexion.php");
$conn = DBConnexion::getConnexion();
$pseudo = $userConnecte['pseudo'];
$querycat= "SELECT * FROM categories WHERE user = '$pseudo' ";
$result = $conn->query($querycat) or die($conn->error);;
while ($row = $result -> fetch_assoc()){
    $cat1fetch = $row["cat1"];
    $cat2fetch = $row["cat2"];
    $cat3fetch = $row["cat3"];
}
if($cat1fetch == "Cours"){
    $testcat1 = "Cours";
    $textcat1 = "NonCours";
}
else{
    $testcat1 = "NonCours";
    $textcat1 = "Cours";
}

if($cat2fetch == "Loisir"){
    $testcat2 = "Loisir";
    $textcat2 = "NonLoisir";
}
else{
    $testcat2 = "NonLoisir";
    $textcat2 = "Loisir";
}

if($cat3fetch == "Nourriture"){
    $testcat3 = "Nourriture";
    $textcat3 = "NonNourriture";
}
else{
    $testcat3 = "NonNourriture";
    $textcat3 = "Nourriture";
}
if(isset($_GET["cat1"])){
    $action = $_GET["cat1"];
    if ($action == '"Cours"'){  
        $cat1 =" UPDATE categories SET cat1='NonCours' WHERE user = '$pseudo' ";
        if ($conn->query($cat1) == TRUE) {
            header('Location:./parametres.php');
        } else {
        echo "Error: " . $cat1 . "<br>" . $conn->error;
        }
    }
    elseif($action == '"NonCours"'){
        $cat1 =" UPDATE categories SET cat1='Cours' WHERE user = '$pseudo' ";
        if ($conn->query($cat1) == TRUE) {
            header('Location:./parametres.php');
        } else {
        echo "Error: " . $cat1 . "<br>" . $conn->error;
        }
    }   
}
if(isset($_GET["cat2"])){
    $action = $_GET["cat2"];
    if ($action == '"Loisir"'){  
        $cat2 =" UPDATE categories SET cat2='NonLoisir' WHERE user = '$pseudo' ";
        if ($conn->query($cat2) == TRUE) {
            header('Location:./parametres.php');
        } else {
            echo "Error: " . $cat2 . "<br>" . $conn->error;
        }
    }
    elseif($action == '"NonLoisir"'){
        $cat2 =" UPDATE categories SET cat2='Loisir' WHERE user = '$pseudo' ";
        if ($conn->query($cat2) == TRUE) {
            header('Location:./parametres.php');
        } else {
            echo "Error: " . $cat2 . "<br>" . $conn->error;
        }
    }
}
if(isset($_GET["cat3"])){
    $action = $_GET["cat3"];
    if ($action == '"Nourriture"'){  
        $cat3 =" UPDATE categories SET cat3='NonNourriture' WHERE user = '$pseudo' ";
        if ($conn->query($cat3) == TRUE) {
            header('Location:./parametres.php');
        } else {
            echo "Error: " . $cat3 . "<br>" . $conn->error;
        }
    }
    elseif($action == '"NonNourriture"'){
        $cat3 =" UPDATE categories SET cat3='Nourriture' WHERE user = '$pseudo' ";
        if ($conn->query($cat3) == TRUE) {
            header('Location:./parametres.php');
        } else {
            echo "Error: " . $cat3 . "<br>" . $conn->error;
        }
    }
}
?>