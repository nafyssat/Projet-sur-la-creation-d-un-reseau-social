<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style1.css">
    <title>Document</title>

    <?php
        require_once("include/fonc_authent.php");
        require_once("include/utilisateurInfo.php");
        $userHash = auth();
        $userConnecte = getUser($userHash);

        //url
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        else
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $url_components = parse_url($url);
        $params = null;
        if(isset($url_components['query'])){
            parse_str($url_components['query'], $params);
        }
        

        // afficher le profil du pseudo passé en get ou bien celui du connecté
        if($params && isset($params['pseudo'])){
            $user = getUser(md5($params['pseudo']));
            $profilDeLutilisateur = false;

            //si le pseudo est le meme de celui connecté 
            if($userHash == md5($params['pseudo'])){
                $profilDeLutilisateur = true;
            }

        }else{
            $user = $userConnecte;
            $profilDeLutilisateur = true;
        }
        require_once("include/DBConnexion.php");
        $conn = DBConnexion::getConnexion();
        $pseudo = $userConnecte['pseudo'];
        $querycat= "SELECT * FROM categories WHERE user = '$pseudo' ";
        $result = $conn->query($querycat) or die($conn->error);
        while ($row = $result -> fetch_assoc()){
            $cat1fetch = $row["cat1"];
            $cat2fetch = $row["cat2"];
            $cat3fetch = $row["cat3"];
        }
    ?>
</head>
<body>
<?php 
    require_once('include/header.php');

    if(!$user){
        echo '<h1>Utilisateur N existe pas</h1>';
        exit;
    }

    $abonnés=nombreDabbone($user['ID']);
    $abonement=nombreDabbonement($user['ID']);

?>


<div class="profil"> 
    <div class="image">
        <img src="image/image2.jpg" alt="bonjour">
    </div>
    <div class="presentation">
        <div class="titre">
        <h5>@<?php echo $user['pseudo'] ?></h5>
            <h3> <?php echo $user['nom'] ." " .$user['prenom']?> </h3>
            
            <p>membre depuis: <?php  echo  $user['inscriptiondate']?></p>
        </div>
        <div class="stats">
           <div class="stat">
               <P><?php echo $abonnés ?> <br> Abonnés</P>
            </div>
           <div class="stat">
               <p><?php echo $abonement ?> <br> Abonnements</p>
           </div>
        </div>
        <div class="follow-btn-container">
            <?php

            

            // si ce n est pas le profil de l ulisateur
            if(!$profilDeLutilisateur){
                ?>
                <form action="include/follow.php" method="POST">
                    <input type="hidden" name="utilisateur-id" value="<?php echo $userConnecte['ID']?>">
                    <input type="hidden" name="followed-id" value="<?php echo $user['ID']?>">
                <?php
                    if(followed($userConnecte['ID'], $user['ID'])){
                        echo '<input type="submit" name="unfollow" value="unfollow" class="unfollow-btn">';
                    }else{
                        echo '<input type="submit" name="follow" value="follow" class="follow-btn">';
                    }
                ?>
                    
                </form>
                <?php
            }
            ?>
        </div>
    </div>

</div>
    <div class="categorie">
                        <h1>Categories</h1>
                        <?php 
                            if ($cat1fetch == "Cours"){
                                echo " Cours <br>";
                            }
                            if ($cat2fetch == "Loisir"){
                                echo " Loisir <br>";
                            }
                            if ($cat3fetch == "Nourriture"){
                                echo " Nourriture <br>";
                            }
                        ?>
                        </div>
    <div class="posts-section">
        <div class="posts">
            <?php
                $posts = getPersonalPosts($user['ID']);
                if($profilDeLutilisateur){
                    foreach ($posts as $key => $post) {
                        echo '<div class="post"><a href="profile.php?pseudo='.$post['pseudo'].'" class="pseudo">@'.$post['pseudo'].'</a>'.
                        '<p class="contenu">'.$post['contenu'].'<p/>';
                    ?> <form action="include/supp.php" method="post">
                        <input type="hidden" name="supp" value="<?php echo $post['id']?>">
                       <button>Suprimer</button>
                   </form><?php
                    }
                    echo '<p class="date">'.$post['date'].'</p></div>';
                }
                else {
                $conn = DBConnexion::getConnexion();
                $userId = $user['ID'];
                $sql = "SELECT * from utilisateur where  ID=$userId";
                $result = $conn->query($sql);
                while ($row = $result -> fetch_assoc()){
                    $resultfetch = $row["private"];
                }
                if (followed($userConnecte['ID'], $user['ID']) == true || $resultfetch == false){

                        foreach ($posts as $key => $post) {
                            echo '<div class="post"><a href="profile.php?pseudo='.$post['pseudo'].'" class="pseudo">@'.$post['pseudo'].'</a>'.
                            '<p class="contenu">'.$post['contenu'].'<p/>';

                    
                            echo '<p class="date">'.$post['date'].'</p></div>';
                        }
                    }
                }
            ?>
        </div>
    </div>

<br><br><br><br><br><br><br>
<?php
require_once('include/footer.php');
?>
    
</body>
</html>
