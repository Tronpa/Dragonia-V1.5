<?php 
include('../include/module/users/user_nbr_live.php');

    try 
	{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
	}
	catch(Exception $e) 
	{ 
	die('Erreur : '.$e->getMessage());
	}
	
?>

<footer class="footer1 col-md-12 mx-auto" style="background-color: #0f1117;">
		<div class="copyright float-left col-md-4">
		<font color="white">Actuellement <?php echo $user_nbr; ?> utilisateur<?php if($user_nbr != 1) { echo "s"; } ?> en ligne <br />
		</div>
		<div class="copyright col-md-6 mx-auto">
			<center><font color="white">© 2018-2019 développé par <a href='https://steamcommunity.com/profiles/76561198007132503/'>ONX_Tronpa</a> <i class='fa fa-heart heart text-danger'></i></font></center>
		</div>		
</footer>