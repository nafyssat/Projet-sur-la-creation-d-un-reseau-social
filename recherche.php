<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="style/style2.css">
</head>
<body class="body">
    <?php
         require_once('include/header.php') ;
         require_once("include/fonc_authent.php");
         require_once('include/research.php');
         $userHash = auth();
       
    ?>
    
    <div class="research">
        <form action="recherche.php" method="post">
            <label for="">
                Pseudo ou categories  :
                <input type="text" name="recherche">
            </label>
           
            <input type="submit" name="submit" value="=>">
        </form>
    </div>
        
        <!--  ce que je vais mtnt -->

        <div class="recherche-resultats">
            <div>
                <?php 
                    if(isset($_POST["recherche"])){
                        echo '<h3>Resultats pour < ' . $_POST["recherche"] .'></h3>';

                        $pseudos = recherchePseudos($_POST["recherche"]);

                        foreach ($pseudos as $pseudo) {
                            echo '<div class="pseudo-div"><a href="profile.php?pseudo='.$pseudo.'">@'.$pseudo.'</a></div>';
                        }
                    }
                ?>
            </div>
        </div>
    
        <br><br><br><br><br><br><br><br><br>
         <br><br><br><br><br><br><br><br><br> 
        <br><br><br><br><br><br><br><br><br>
        <?php require_once('include/footer.php') ;?>
  
    
</body>
</html>