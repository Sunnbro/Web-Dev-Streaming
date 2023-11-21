<?php
include('configuration.php');
session_start(); //creer session
$loginst = 0;
if (isset($_SESSION['username'])){ 

$user_check = $_SESSION['username'];

$ses_sql = mysqli_query($conn,"SELECT username FROM users WHERE username='$user_check' "); //chercher le username dans la bdd

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];

if(!empty($login_user)) // si le user existe dans la bdd logint=1
{
   $loginst = 1;
}  
}

?>