<?php
    require_once('DBConnexion.php');
    


    function getUser($userHash){
        $conn = DBConnexion::getConnexion();

        $sql = "SELECT * FROM utilisateur where userhash = '$userHash'";

        $user = [];

        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                $user = $row;
                break;
            }
            $result -> free();
        }

        return $user;
    }
    //obtenir le pseudo de tout les utilisateur;
   

    

    // tous ceux qui sont abonné a l'utilisateur connecté
    function getfollowers($userId){
        $conn = DBConnexion::getConnexion();

        $sql = "SELECT utilisateur_id FROM followers where followed_id = '$userId'";

        $abonnes = [];

        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                array_push($abonnes, $row['utilisateur_id']);
            }
            $result -> free();
        }

        return $abonnes;
    }

    // les personnes que l utilisateur connecté s est abonné
    function getfollowings($userId){
        $conn = DBConnexion::getConnexion();

        $sql = "SELECT followed_id FROM followers where utilisateur_id = '$userId'";

        $abonnements = [];

        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                array_push($abonnements, $row['followed_id']);
            }
            $result -> free();
        }

        return $abonnements;
    }

    function nombreDabbone($userId){
        $conn = DBConnexion::getConnexion();
        
        $sql="SELECT count(*) FROM followers WHERE followed_id = '$userId'";
        $abonnes = 0;
        
        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                $abonnes = $row['count(*)'];
                break;
            }
            $result -> free();
        }
        
        return $abonnes;
    }

    function nombreDabbonement($userId){
        $conn = DBConnexion::getConnexion();

        $sql="SELECT count(*) FROM followers WHERE utilisateur_id = '$userId'";
        
        $abonnements = 0;

        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                $abonnements = $row['count(*)'];
                break;
            }
            $result -> free();
        }
        
        return $abonnements;
    }

    //postes de l'utilisateurs et des abonnemets
    function getPosts($userId){
        $conn = DBConnexion::getConnexion();
        $abonnements = getfollowings($userId);
        array_push($abonnements, $userId);
        $abonnements = implode(',', $abonnements);

        $sql = "SELECT postes.*, utilisateur.pseudo from postes, utilisateur where postes.utilisateur_id in ($abonnements) and utilisateur.ID = postes.utilisateur_id order by postes.date DESC";

        $postes=[];
        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                array_push($postes, $row);
            }
            $result -> free();
        }
        return $postes;

    }

    // postes de l 'utilisateur
    function getPersonalPosts($userId){
        $conn = DBConnexion::getConnexion();

        $sql = "SELECT postes.*, utilisateur.pseudo from postes, utilisateur where postes.utilisateur_id = '$userId' and utilisateur.ID = postes.utilisateur_id order by postes.date DESC";

        $postes=[];
        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                array_push($postes, $row);
            }
            $result -> free();
        }
        return $postes;
    }

    // verrifier si l utilisateur a foloow un autre utilisateur
    function followed($userId, $followed_Id){
        $conn = DBConnexion::getConnexion();

        $sql="SELECT * FROM followers WHERE utilisateur_id = '$userId' and followed_id = $followed_Id";
        
        $abonnements = 0;

        if($result = $conn->query($sql)){
            while ($row = $result -> fetch_assoc()){
                return true;
            }
            $result -> free();
        }

        // si rien n est trouvé
        return false;
    }
    


?>