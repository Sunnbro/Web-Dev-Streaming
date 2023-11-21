<html>
  <head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet"> 
    <link
      rel="icon"
      type="image/png"
      sizes="14x14"
      href="https://pngimg.com/uploads/netflix/netflix_PNG15.png"
    /><link rel="stylesheet" href="logincss.css" type="text/css" />
  </head>
  <body style="background-color: #0C0101">

      <nav>
      <div class="logo">
                <a href="index.html"><img src="../users_streaming/nnn.png"></a>
            </div>
          </nav>
  <?php
require('configuration.php');//requiret la connexion a la bdd avant de commencer
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);//on a utilisé .hash pour securiser les password dans la base de donnees
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";//requete sql pour prendre les rows ou username et le password match
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){ // si il ya un match est le nombre de rows dans la bdd =1 on redirect vers film.php 
	    $_SESSION['username'] = $username;
        echo "<script>alert('Bienvenue ! ')</script>";//afficher message de Bienvenue
        header("Location: film.php");
	}else{//sinon si mdp ou username incorrect afficher message d'erreur
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	    echo "<script>alert('Vous n\'avez pas de compte. \inscrivez-vous !');</script>";//boite msg d'erreur
    
        }
}
?>



          <div id="container">
              <form action="" method="POST" style="background-color: #808080"> 
                  <h1>Connexion</h1>

                  <label><b>Nom d'utilisateur</b></label>
                  <input type="text"
                         placeholder="Entrer le nom d'utilisateur"
                         name="username"
                         required />

                  <label><b>Mot de passe</b></label>  
                  <input type="password"
                         placeholder="Entrer le mot de passe"
                         name="password"
                         required />

                  <input   type="submit" id="submit" value="LOGIN"  />
              <p class="box-register">vous n'etes pas inscrit? <a href="signup.php">inscrivez-vous ici</a></p>
                  
                  </form>
          </div>
  </body>
</html>