<?php 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');

$reponse = $bdd->query('SELECT * FROM users WHERE id = '.$_SESSION['id'].'');

while ($donnees = $reponse->fetch()) {

// Set session variables
$_SESSION["ban"] = $_SESSION["ban"];

if($_SESSION['ban'] == 1) {
   header('Location: ../pages/ban.php?you_are_banned');
   exit;
}

}
$reponse->closeCursor();
?>