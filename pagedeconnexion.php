<meta charset="utf-8">
<html>
<head>
  <title>facechat</title>
  <link rel="stylesheet" href ="style/style1.css">

</head>
<body>
      <header>
        <img src="image/logo.png"  alt="" width="60px" height="60px">
        <h1>Find'Em</h1>
        <hr>
      </header>
      <main>
        <form  action="include/connexion.php" method="post">
          <h2 class="text_center">Connexion</h2>
        <div>
            <label for="name">Veuillez entrez votre pseudo pour vous connecter !</label>
             <br>
            <input type="text" name="pseudo">
          </div>
          <div>
            <label  name="mot de passe">Entrez votre mot de passe</label>
              <br>
            <input  type="password" name="motdepasse">
          </div>
            <br>
            <input type="submit" value="connexion">
            <input type="reset" >
            <?php

              setcookie('userhash', '', time(), "/");

              if(!empty($_REQUEST['message'])){

                echo '<p class="erreur">'.$_REQUEST["message"].'</p>';
              }
             ?>


            <p>Vous n'avez pas encore de compte ? Inscrivez-vous   <a href="./pagedinscription.php">ici</a> </p>



        </form>
      </main>


    <footer>
    <h5> Copyright &copy; site Find'Em 2021</h5>
    </footer>

</body>
</html>
