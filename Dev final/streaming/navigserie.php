<?php 
include("check.php");   
?>

<?php 
if ($loginst == 1){ //ceci est le header qui va s'afficher si un user est connecté?>
    <div class="logo">
               <a href="index.html"><img src="../streaming/nnn.png"></a>
            </div>
            <div class="onglets">
                <a href="/streaming/index.html">Accueil</a>
                <a href="film.php">Films</a>
                <a href="anime.php">Animes</a>
                <a href="logout.php"><?php echo "<h3 style='color:red;' >$user_check (Logout)<h3>"  //user_check est le username du user de la session actuelle  ?></a>
                </div>
<?php } else { //ceci est le header qui va s'afficher si un user n'est pas connecté?>
    <div class="logo">
               <a href="index.html"><img src="../streaming/nnn.png"></a>
            </div>
            <div class="onglets">
                <a href="/streaming/index.html">Accueil</a>
                <a href="film.php">Films</a>
                <a href="anime.php">Animes</a>
                <a href="login.php">Se connecter</a>
                </div>
<?php } ?>