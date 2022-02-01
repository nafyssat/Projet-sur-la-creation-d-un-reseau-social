<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style2.css">
</head>
<body class="myadmin">
    <h1>Compte Administrateur</h1>
    <p> Connectez vous en tant qu'administrateur :</p>

    <form action="admin.php" method="post">
        <table class="table">
            <tr>
                <td><label for="pseudo">Pseudo</label></td>
                <td><input type="text" name="pseudo"></td>
            </tr>
            <tr>
                <td><label for="motdepasse">Mot De Passe</label></td>
                <td><input type="text" name="motdepasse"></td>
            </tr>
            <tr>
                <td> <input type="submit"></td>
                <?php if(isset($_GET['erreur'])){
                    echo $_GET['erreur'];
                }
                    
                    ?>
            </tr>
        </table>
    </form>
        
</body>
</html>
