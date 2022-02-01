<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="style/style2.css">
    <?php 
        require_once("include/fonc_authent.php");
        require_once("include/utilisateurInfo.php");
        $userHash = auth();
        $user = getUser($userHash);
    ?>
</head>
<body>
    <?php 
        require_once('include/header.php');
    ?>

    <div class="nouveau-post">
        <form action="include/evalpost.php" method="POST" >
            <h4>Nouveau Poste</h4>
            <input type="hidden" name="ID" value="<?php echo $user['ID']?>">
            <textarea name="contenu" id="cotenu" cols="25" rows="8" maxlength="600" placeholder="Quoi de neuf?"></textarea>
            <br>
            <div class="submit-btn">
                <input type="submit" name="submit">
            </div>
            
        </form>
    </div>
    

    <h1>Bienvenue <?php echo $user['nom'] . ' ' . $user['prenom'] ?></h1>

    <div class="posts-section">
        <div class="posts">
            <?php
                $posts = getPosts($user['ID']);
                foreach ($posts as $key => $post) {
                   
                    echo    '<div class="post"><a href="profile.php?pseudo='.$post['pseudo'].'" class="pseudo">@'.$post['pseudo'].'</a>'.
                   
                    '<p class="contenu">'.$post['contenu'].'<p/>';
                     if($post['utilisateur_id']==$user['ID']){
                         ?> <form action="include/supp.php" method="post">
                             <input type="hidden" name="supp" value="<?php echo $post['id']?>">
                            <button>Suprimer</button>
                        </form>
                       
                        <?php
                    }
                    echo '<p class="date">'.$post['date'].'</p></div>';
                   
                }
            ?>
        </div>
    </div>
    
    

    
    <?php 
        require_once('include/footer.php');
    ?>

    
</body>
</html>