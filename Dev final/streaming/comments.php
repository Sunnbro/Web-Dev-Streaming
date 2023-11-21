<?php
function setComments($conn){
if(isset($_POST['commentSubmit'])) {

     // on recolte les donnees de lutilisateur(username,temps du comment et le message)
   
$uid = $_POST['uid'];
$date = $_POST['date'];
$page = $_POST['page'];
$message = $_POST['message'];



$sql = "INSERT INTO comments (uid, date, message, page) VALUES ('$uid','$date', '$message', '$page')"; //on les insere dans la BDD
$result1 = mysqli_query($conn,$sql) or die(mysql_error());

header('Location: film.php');//on redirect le user vers le menu
}
}

function getComments($conn){
 //prendre tout les comments de la BDD
 $current_file_name = basename($_SERVER['PHP_SELF']);
$sql = "SELECT * FROM comments WHERE page = '$current_file_name' ORDER BY date DESC";//prendre de la table les commentaires de la page actuelle seulement
                                                         //afficher les commentaires les plus recents d'abord
$result1 = mysqli_query($conn,$sql);//les mettre dans l'array

while($row = mysqli_fetch_assoc($result1)){//tant que il reste des comments

echo "<div class='comment-box'>";
echo "<img style='height:30px;' src='https://pngimg.com/uploads/netflix/netflix_PNG15.png'> &bull; &nbsp";
echo "<h1 style='color:AF9749;'><strong>".$row['uid']."</strong></h1>&nbsp";
echo "<p style='text-align:right;'>".$row['date']."</p><br>";

echo nl2br("<p>".$row['message']."</p><br><br>");
echo"</p></div>";
 //echo,afficher tout
if (!$row) {
	echo "Aucun commentaires.";
}
}

}

?>