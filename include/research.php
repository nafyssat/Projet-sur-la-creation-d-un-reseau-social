<?php 
    require_once('DBConnexion.php');


    function recherchePseudos($valeur){
        $conn = DBConnexion::getConnexion();
        if ($valeur == 'Cours' || $valeur == 'Loisir' || $valeur == 'Nourriture') {
            $query = "SELECT * FROM categories WHERE cat1 = '$valeur' or cat2 = '$valeur' or cat3 = '$valeur'";
            $result = $conn->query($query) or die($conn->error);
            $pseudos = [];
            while ($row = $result -> fetch_assoc()) {
                array_push($pseudos, $row['user']);
            }
        } 
        else {
            $query = "SELECT pseudo FROM utilisateur WHERE pseudo LIKE '%$valeur%' or nom like '%$valeur%' or prenom like '%$valeur'";
            $result = $conn->query($query) or die($conn->error);
            $pseudos = [];
                while ($row = $result -> fetch_assoc()) {
             array_push($pseudos, $row['pseudo']);
        }
        }


        return $pseudos;
    }
    
 
?>
