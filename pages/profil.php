<?php
include('../include/config.php');	
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth', 'mc_auth', 'D23btGB36wU27d1g');

if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 10000000;
   $extensionsValides = array('jpg', 'jpeg', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "/var/www/html/uploads/avatar/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profil.php?id='.$_SESSION['id']);
         } else {
            $msg = "<font color='red'></b>Erreur durant l'importation de votre photo de profil</font></b>";
         }
      } else {
         $msg = "<font color='red'></b>Votre photo de profil doit être au format jpg, jpeg ou png</font></b>";
      }
   } else {
      $msg = "<font color='red'>Votre photo de profil ne doit pas dépasser 10Mo</font></b>";
   }
}

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $id = $_SESSION['id'];
   $user = $requser->fetch();
   
   if(isset($_SESSION['id'])) {
      $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
      $insertip = $bdd->prepare("UPDATE users SET ip = ? WHERE id = ?");
      $insertip->execute(array($ip, $_SESSION['id']));

   }
   
   if(isset($_POST['discord_profil']) AND !empty($_POST['discord_profil']) AND $_POST['discord_profil'] != $user['pseudo']) {
	  
      $discord_profil = htmlspecialchars($_POST['discord_profil']);
      $insertdiscord = $bdd->prepare("UPDATE users SET discord_profil = ? WHERE id = ?");
      $insertdiscord->execute(array($discord_profil, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   if(isset($_POST['profil_steam']) AND !empty($_POST['profil_steam']) AND $_POST['profil_steam'] != $user['pseudo']) {
      $profil_steam = htmlspecialchars($_POST['profil_steam']);
      $insertprofils_steam = $bdd->prepare("UPDATE users SET profil_steam = ? WHERE id = ?");
      $insertprofils_steam->execute(array($profil_steam, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   } 
   
   if(isset($_POST['profil_bnet']) AND !empty($_POST['profil_bnet']) AND $_POST['profil_bnet'] != $user['pseudo']) {
      $profil_bnet = htmlspecialchars($_POST['profil_bnet']);
      $insertprofils_bnet = $bdd->prepare("UPDATE users SET profil_bnet = ? WHERE id = ?");
      $insertprofils_bnet->execute(array($profil_bnet, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   } 
   
   if(isset($_POST['profil_discord']) AND !empty($_POST['profil_discord']) AND $_POST['profil_discord'] != $user['pseudo']) {
      $profil_discord = htmlspecialchars($_POST['profil_discord']);
      $insertprofils_discord = $bdd->prepare("UPDATE users SET profil_discord = ? WHERE id = ?");
      $insertprofils_discord->execute(array($profil_discord, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   } 
   
   if(isset($_POST['profil_youtube']) AND !empty($_POST['profil_youtube']) AND $_POST['profil_youtube'] != $user['pseudo']) {
      $profil_youtube = htmlspecialchars($_POST['profil_youtube']);
      $insertprofils_youtube = $bdd->prepare("UPDATE users SET profil_youtube = ? WHERE id = ?");
      $insertprofils_youtube->execute(array($profil_youtube, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   } 
 
   if(isset($_POST['profil_twitch']) AND !empty($_POST['profil_twitch']) AND $_POST['profil_twitch'] != $user['pseudo']) {
      $profil_twitch = htmlspecialchars($_POST['profil_twitch']);
      $insertprofils_twitch = $bdd->prepare("UPDATE users SET profil_twitch = ? WHERE id = ?");
      $insertprofils_twitch->execute(array($profil_twitch, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }  
   
   if(isset($_POST['profil_instagram']) AND !empty($_POST['profil_instagram']) AND $_POST['profil_instagram'] != $user['pseudo']) {
      $profil_instagram = htmlspecialchars($_POST['profil_instagram']);
      $insertprofils_instagram = $bdd->prepare("UPDATE users SET profil_instagram = ? WHERE id = ?");
      $insertprofils_instagram->execute(array($profil_instagram, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   } 
 
   if(isset($_POST['profil_twitter']) AND !empty($_POST['profil_twitter']) AND $_POST['profil_twitter'] != $user['pseudo']) {
      $profil_twitter = htmlspecialchars($_POST['profil_twitter']);
      $insertprofils_twitter = $bdd->prepare("UPDATE users SET profil_twitter = ? WHERE id = ?");
      $insertprofils_twitter->execute(array($profil_twitter, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
 
   if(isset($_POST['profil_facebook']) AND !empty($_POST['profil_facebook']) AND $_POST['profil_facebook'] != $user['pseudo']) {
      $profil_facebook = htmlspecialchars($_POST['profil_facebook']);
      $insertprofils_facebook = $bdd->prepare("UPDATE users SET profil_facebook = ? WHERE id = ?");
      $insertprofils_facebook->execute(array($profil_facebook, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   } 
 
   if(isset($_POST['sex']) AND !empty($_POST['sex']) AND $_POST['sex'] != $user['pseudo']) {
      $sex = htmlspecialchars($_POST['sex']);
      $insertsex = $bdd->prepare("UPDATE users SET sex = ? WHERE id = ?");
      $insertsex->execute(array($sex, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   if(isset($_POST['avatar']) AND !empty($_POST['avatar']) AND $_POST['avatar'] != $user['pseudo']) {
      $avatar = htmlspecialchars($_POST['avatar']);
      $insertavatar = $bdd->prepare("UPDATE users SET avatar = ? WHERE id = ?");
      $insertavatar->execute(array($avatar, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   if(isset($_POST['anniversaire']) AND !empty($_POST['anniversaire']) AND $_POST['anniversaire'] != $user['pseudo']) {
      $anniversaire = htmlspecialchars($_POST['anniversaire']);
      $insertanniversaire = $bdd->prepare("UPDATE users SET anniversaire = ? WHERE id = ?");
      $insertanniversaire->execute(array($anniversaire, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $user['pseudo']) {
      $prenom = htmlspecialchars($_POST['prenom']);
      $insertprenom = $bdd->prepare("UPDATE users SET prenom = ? WHERE id = ?");
      $insertprenom->execute(array($prenom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
     
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE users SET username = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE users SET password = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $sitename?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo $iconsite?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
	<link rel="stylesheet" href="../assets/css/animate.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body data-background-color="dark">
	<div class="wrapper">
	<?php include('../include/navbar.php');?>	
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
				
					<div class="page-header">
						<h4 class="page-title">Accueil</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../index.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="../profil.php">Modifier les informations de mon compte</a>
							</li>
						</ul>
					</div><!--HEADER-->
							
			<div class="row">
					<div class="col-md-12">
						<div class="card">
								
							<div class="card-header">
								<h4 class="card-title"><center>Modifier les informations du profil</center></h4>
							</div>
							<center><?php if(isset($msg)) { echo $msg; } ?></center>
						<div class="card-body" style="background-position: center; background-repeat: no-repeat; background-image: url('../assets/img/background/<?php echo $user['background']; ?>')">
						
						<div class="col-md-12">
							<center><div class="avatar1">
							 <img src="../uploads/avatar/<?php echo $user['avatar']; ?>" id="preview" width="142px" height="142px" class="rounded-circle">
							</div></center>
							
							<form method="POST" action="" enctype="multipart/form-data">
							<div class="form-group">
								<div class="input-group mb-13">
									<div class="col-md-4 mx-auto input-group-prepend">
										<input type="file" class="form-control" name="avatar" id="avatar" aria-label="avatar" aria-describedby="basic-addon1">
										<input type="submit" value="Upload" name="submit">
									</div>
								</div>
							</div>	
							</form>
							
								<div class="mx-auto">
									<p></p>
										<center><div class="name"><font color="#FFF"><i class="<?php echo $user['icon']; ?>"></i> <?php echo $user['username']; ?></font> <?php echo $user['groupe']; ?></font></div>
										<div class="job"><b><font color="#FFFFFF">Enregistré depuis le :</font></b></div>
										<div class="desc"><b><font color="#FFFFFF">(<?php echo $user['date']; ?>)</font></b></div>
									<p></p>
										<div class="name3"><b><font color="RED">DEBUG ON</font></b></div>
										<div class="id"><b><font color="#fff">ID dans la BDD:</font> <font color="RED"><?php echo $_SESSION["id"]; ?></font></b></div>
										<div class='pseudo-id'><font color="#fff"> Pseudo dans la BDD:</font> <font color="RED"><?php echo $_SESSION['username']; ?></font></b></div>
										<div class='pseudo-id'><font color="#fff"> Votre ip:</font> <font color="RED"><?php echo $_SERVER['REMOTE_ADDR']; ?></font></b></div></center>
									<p></p>
								</div>
						
								<form method="POST" action="" enctype="multipart/form-data">	
								
									<div class="form-check col-md-4 mx-auto">
										<center><label class="form-radio-label">
											<input class="form-radio-input" type="radio" name="sex" name="optionsRadios" value="Homme">
											<span name="sex" class="form-radio-sign">Homme</span>
										</label>
									
										<label class="form-radio-label">
											<input class="form-radio-input" name="sex" type="radio" name="optionsRadios" value="Femme">
											<span name="sex"  class="form-radio-sign">Femme</span>
										</label></center>
									</div>
										
										<div class="input-group col-md-4 mx-auto mb-13">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><?php echo $user['prenom']; ?></span>
											</div>
												<input type="text" required minlength="4" maxlength="14" size="14" class="form-control"  name="prenom" placeholder="Prenom" aria-label="Prenom" aria-describedby="basic-addon1">
										</div>
										
			
										<div class="input-group col-md-4 mx-auto mb-13">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><?php echo $user['username']; ?></span>
											</div>
												<input type="text" required minlength="4" maxlength="16" size="16" class="form-control"  name="newpseudo" placeholder="Pseudo" aria-label="Pseudo" aria-describedby="basic-addon1">
										</div>
										
										<div class="input-group col-md-4 mx-auto mb-13">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><?php echo $user['anniversaire']; ?></span>
											</div>
												<input type="date" class="form-control"  name="anniversaire" placeholder="anniversaire" aria-label="anniversaire" aria-describedby="basic-addon1">
										</div>
										
										<div class="input-group col-md-4 mx-auto mb-13">
											<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><?php echo $user['email']; ?></span>
											</div>
												<input type="text" size="64" maxLength="64" required placeholder="@gmail.com uniquement" pattern="^[a-zA-Z][-_.a-zA-Z0-9]{5,29}@g(oogle)?mail.com" class="form-control" name="newmail" aria-label="newmail" aria-describedby="basic-addon1">
										</div>
										<p></p>
									</div>
								</div>
						
									<center>
											<div class="card-footer col-md-12 mx-auto">
												<input type="submit" class="btn btn-primary" value="Mettre à jour mon profil">
											</div>
									</center>
								</div>	
							</form>
						</div><!--COL-->
					</div><!--ROW-->
		
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><center>Paramètretre de votre widget Discord</center></h4>
							</div>
							
							<div class="card-body">
								<div class="col-md-12 mx-auto">
									<div class='discord'>
									<iframe src="https://discordapp.com/widget?id=<?php echo $user['discord_profil']; ?>&theme=dark" width="100%" height="482" allowtransparency="true" frameborder="0"></iframe>
									</div>
								</div>
								
							<form method="POST" action="" enctype="multipart/form-data">
									<input type="text" class="form-control"  name="discord_profil" placeholder="WIDGET ID" aria-label="discord_profil" aria-describedby="basic-addon1">
						
								<div class="card-footer col-md-12 mx-auto">
									<center><input type="submit" class="btn btn-primary" value="Valider"></center>
								</div>
							</form>
							</div>	
						</div><!--COL-->
					</div>
				
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><center>Autres informations</center></h4>
							</div>
							
							<div class="card-body">
								<div class="col-md-12 mx-auto">
									<div class='gaming-card'>
									
									<font color="white"><center><p>Platerform de jeux</p><center></font>
									
								<form method="POST" action="" enctype="multipart/form-data">
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/steam.png"> | <?php echo $user['profil_steam']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_steam" placeholder="" aria-label="profil_steam" aria-describedby="basic-addon1">
									</div>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/bnet.png"> | <?php echo $user['profil_bnet']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_bnet" placeholder="" aria-label="profil_bnet" aria-describedby="basic-addon1">
									</div>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/discord.png"> | <?php echo $user['profil_discord']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_discord" placeholder="" aria-label="profil_discord" aria-describedby="basic-addon1">
									</div>
									
									<p></p>
									<font color="white"><center><p>Plateform de Streaming</p><center></font>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/youtube.png"> | <?php echo $user['profil_youtube']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_youtube" placeholder="" aria-label="profil_youtube" aria-describedby="basic-addon1">
									</div>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="20" width="24" src="../assets/img/twitch.png"> | <?php echo $user['profil_twitch']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_twitch" placeholder="" aria-label="profil_twitch" aria-describedby="basic-addon1">
									</div>
									
									<p></p>
									<font color="white"><center><p>Réseaux Sociaux</p><center></font>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/instagram.png"> | <?php echo $user['profil_instagram']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_instagram" placeholder="" aria-label="profil_instagram" aria-describedby="basic-addon1">
									</div>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/twitter.png"> | <?php echo $user['profil_twitter']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_twitter" placeholder="" aria-label="profil_twitter" aria-describedby="basic-addon1">
									</div>
									
									<div class="input-group col-md-5 mx-auto">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><img height="24" width="24" src="../assets/img/facebook.png"> | <?php echo $user['profil_facebook']; ?></span>
										</div>
											<input type="text" class="form-control" name="profil_facebook" placeholder="" aria-label="profil_facebook" aria-describedby="basic-addon1">
									</div>
									</div>
								</div>
							</div>
							
								<center><font color="red"><p>Attention, les informations apparaîtront sur votre profil public</p></font></center>
									<div class="card-footer col-md-12 mx-auto">
										<center><input type="submit" class="btn btn-primary" value="Valider les informations"></center>
									</div>
								</form>
							</div>	
						</div><!--COL-->
				</div><!--ROW-->
			</div>
		</div><!--CONTENT-->
		
	<?php include('../include/theme.php');?>
	<?php include('../include/footer.php');?>
		</div><!--MAIN PANEL-->

	<!--   Core JS Files   -->
	<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Chart JS -->
	<script src="/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="/assets/js/plugin/chart-circle/circles.min.js"></script>
	
	<!-- Datatables -->
	<script src="/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="/assets/js/atlantis.min.js"></script>

	<!-- Particules -->
	<script src="/assets/js/particles.min.js"></script>
	<script src="/assets/js/particles.js"></script>
	<script src="/assets/js/app.js"></script>
	<script src="/assets/js/setting-demo2.js"></script>
	<script src="/assets/js/demo.js"></script>
	<script src="/assets/js/carousel.js"></script>
	<script src="/assets/js/collapse.js"></script>
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
	</script>
<script>
$(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
});
$('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
});
</script>
</div>
</body>
</html>

<?php   
}
else {
   header("Location: login.php");
}
?>