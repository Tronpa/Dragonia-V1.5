<?php 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', '');

$reponse = $bdd->query('SELECT * FROM users WHERE id = '.$_SESSION['id'].'');

while ($donnees = $reponse->fetch()) {

// Set session variables
$_SESSION["groupe_admin"] = $donnees["groupe_admin"];

if($_SESSION['groupe_admin'] == 0) {
   header('Location: ../pages/404.php?permission_denied');
   exit;
}

}
 $reponse->closeCursor();
?>
