<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page D'Inscription</title>
    <link rel="stylesheet" href ="style/style1.css">
  </head>
  <body >
    <header>
      <img src="image/logo.png"  alt="" width="60px" height="60px">
      <h1>Find'Em</h1>
      <hr>
    </header>

    <main>
      <h5>Bienvenue dans Facechat, pour vous inscrire veuillez remplir les champs suivantes!</h5>
      <div class="form-groupe">
        <form  action="include/inscription.php" method="post">
          <table>
            <tr>
              <td><label for="name"> Nom de famille</label></td>
              <td><input type="text" name="nom"></td>
            </tr>
            <tr>
              <td><label for="name"> Prenom </label></td>

              <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
              <td><label for="name"> Pseudo </label></td>

              <td><input type="text" name="pseudo" ></td>
            </tr>
            <tr>
                <td><label for="genre">Genre : </label></td>

                <td>  <input type="radio" name="sexe" value="masculin">
                  <label for="name">masculin</label>
                  <input type="radio" name="sexe" value="feminin">
                  <label for="name">feminin</label>
                  <input type="radio" name="sexe" value="nonbinaire">
                  <label for="name">non binaire</label>
                </td>
                </tr>
                <tr>
                <td><label for="date de naissance"> Date de naissance</label></td>

                 <td><input type="date" name="datedenaissance"></td>
               </tr>
               <tr>
                 <td><label for="name"> Adresse email </label></td>

               <td><input type="email" name="email"></td>
             </tr>


               <tr>
                 <td> <label for="name">Mot de passe</label></td>
                 <td><input type="password" name="motdepasse"></td>
              </tr>

               <tr>
                <td><input type="submit"></td>
                <td><input type="reset"></td>
             </tr>
          </table>
        </form>
      </div>
      <p>Vous avez déjà un compte ? Connectez-vous <a href="./pagedeconnexion.php">ici</a> </p>
        <?php
          if(!empty($_REQUEST['message'])){

            echo '<p class="erreur">'.$_REQUEST["message"].'</p>';
          }
         ?>
    </main>


    <footer>
    <h5> Copyright &copy; site Find'Em 2021</h5>
    </footer>



  </body>
</html>
