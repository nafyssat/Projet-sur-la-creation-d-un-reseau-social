<?php
    require_once("../include/DBConnexion.php");
    $conn = DBConnexion::getConnexion();
    $sql1=" SELECT*FROM utilisateur ";
    $sql=" SELECT*FROM postes where " ;
    
    if($result = $conn->query($sql)){
        while ($row = $result -> fetch_assoc()){
            echo $resultat;
            
        }
        $result -> free();
    }
 
