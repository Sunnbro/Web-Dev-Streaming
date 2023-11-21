<html>
<head>
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link
      rel="icon"
      type="image/png"
      sizes="14x14"
      href="https://pngimg.com/uploads/netflix/netflix_PNG15.png"
    /><link rel="stylesheet" href="../streaming/logincss.css" />
</head>
<body style="background-color: #0C0101">
<div class="logo">
               <a href="index.html"><img src="../streaming/nnn.png"></a>
            </div>
 <?php
 require('configuration.php');
 if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    //requéte SQL + mot de passe crypté avec .hash
    $query = "INSERT into `users` (username, email, password)
    VALUES ('$username', '$email', '".hash('sha256', $password)."')";
    // Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
    echo "<div class='succes'>
        <h3>Vous êtes inscrit avec succès.</h3>
        <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
    </div>";
    }
    }else{
    ?>


    <div id="container">
        <form action="" method="POST" style="background-color: #808080">
            <h1>Inscription</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text"
                   placeholder="Entrer votre nom"
                   name="username"
                   required />

            <label><b>Adresse Email</b></label>
            <input type="text"
                   placeholder="Entrer l'adresse email"
                   name="email"
                   required />

            <label><b>Mot de passe</b></label>
            <input type="password"
                   placeholder="Entrer le mot de passe"
                   name="password"
                   required />

           
            <input type="submit" id="submit" value="SIGN UP" />
            <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
        </form>
    </div>

    <?php } ?>
</body>
</html>