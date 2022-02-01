<?php 

require_once("include/fonc_authent.php");
require_once("include/utilisateurInfo.php");
$userHash = auth();
$userConnecte = getUser($userHash);
require_once("include/DBConnexion.php");
$conn = DBConnexion::getConnexion();
$pseudo = $userConnecte['pseudo'];
$utilisateur_id=$userConnecte['ID'];
include("include/edit.php");
include("include/categories.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profile de 
    <?php 
        echo $pseudo;

    ?></title>
    <link rel="stylesheet" href ="style/style1.css">
    <link rel="stylesheet" href="style/style2.css">
</head>
<body>
    <?php require_once('include/header.php'); ?>
      <main>
        <div>
            <section class="colonne">
                <div class="col-12 col-1-9">
                    <div class="bloc bloc1 col-12">
                        <h1><?php
                            if($result = $conn->query($queryperso)){
                                echo $pseudo;
                            }
                        ?>
                        </h1>
                        <div class="colm bloc1 col-12 col-1-3">
                            <div class="image">
                                <img src="image/image2.jpg" alt="bonjour">
                            </div>
                            <h3> Followers : 
                                <?php 
                                    $queryfollow = "SELECT * FROM followers WHERE utilisateur_id = '$utilisateur_id'";
                                    $result = $conn->query($queryfollow) or die($conn->error);
                                    $nbfollow = '0';
                                    while ($row = $result -> fetch_assoc()) {
                                        $nbfollow = $nbfollow + '1';
                                    }
                                     echo $nbfollow;
                                    
                                ?>  
                            </h3>
                        </div>
                      
                        <div class="colm bloc1 col-4-12">       
                            <ul class="liste">
                                <li class="n">
                                    Naissance le :
                                    <?php
                                        if ($result = $conn->query($queryperso)){
                                            while ($row = $result -> fetch_assoc()){
                                                $resultfetch = $row["datedenaissance"];
                                                echo '<b>'.$resultfetch.'</b>';
                                            }
                                        }

                                    ?>
                                    <form action="" type="get">
                                        <li>
                                            Modifier date de naissance : 
                                            <input type="date" name="datedenaissance">
                                            <input type='submit' value="Valider">
                                        </li>
                                        Email :
                                        <?php
                                        if ($result = $conn->query($queryperso)){
                                            while ($row = $result -> fetch_assoc()){
                                                $resultfetch = $row["email"];
                                                echo '<b>'.$resultfetch.'</b>';
                                            }
                                        }
                                        ?>
                                        <li>
                                            Modifier email : 
                                            <input type="email" name="email">
                                            <input type='submit' value="Valider">
                                        </li>
                                    </form>
                                    <form action="" type="get">
                                        <div class='follow'>
                                            <input name='private' type='hidden' value='"<?php echo $testprivate?>"'/>
                                            <button name='subprivate' type='submit' value='"<?php echo $textprivate?>"'/>
                                            <?php 
                                            echo $textprivate;
                                            ?>
                                            </button>
                                        </div>
                                    </form>
                                    
                                </li>
                                
                            </ul>

                        </div>
                    </div>
                    <div class="bloc bloc1 col-12">
                        <h1>Categories</h1>
                        <form action="" type="get">
                            <input name='cat1' type='hidden' value='"<?php echo $testcat1?>"'/>
                            <button name='submit' type='submit' value='"<?php echo $textcat1?>"'/>
                                <?php 
                                    echo $textcat1;
                                ?>
                            </button>
                        </form>
                        <br>
                        <form action="" type="get">
                            <input name='cat2' type='hidden' value='"<?php echo $testcat2?>"'/>
                            <button name='submit' type='submit' value='"<?php echo $textcat2?>"'/>
                                <?php 
                                    echo $textcat2;
                                ?>
                            </button>
                        </form>
                        <br>
                        <form action="" type="get">
                            <input name='cat3' type='hidden' value='"<?php echo $testcat3?>"'/>
                            <button name='submit' type='submit' value='"<?php echo $textcat3?>"'/>
                                <?php 
                                    echo $textcat3;
                                ?>
                            </button>
                        </form>
                    </div>
            </section>
            
        </div>


      </main>
</body>

</html>