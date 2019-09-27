<?php 
session_start(); 
include('../admin/includes/config.php');

if(isset($_POST['deladmin'])) {
	$deladmin = htmlspecialchars($_POST['deladmin']);
	try
{ 
	$pdo = new PDO("mysql:host=127.0.0.1; dbname=mc_auth", "mc_auth", "D23btGB36wU27d1g"); 
	$pdo->setAttribute(PDO::ATTR_ERRMODE,  
	PDO::ERRMODE_EXCEPTION); 
}
	catch(PDOException $e)
{ 
	die("ERROR: Could not connect. " . $e->getMessage()); 
} 
	try
{ 
	$sql = "DELETE FROM users WHERE ID=".($_POST['deladmin']).""; 
	$pdo->exec($sql); 
	
	$succesdelet; 
}
	catch(PDOException $e)
{ 
	die("ERROR: Could not able to execute $sql." 
	. $e->getMessage()); 
} 
	unset($pdo); 
}

if(isset($_POST['addadmin'])) {
   $id = htmlspecialchars($_POST['id']);
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['id']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO users(id, username, email, password) VALUES(?, ?, ?, ?)");
                     $insertmbr->execute(array($id, $pseudo, $mail, $mdp));
                     $erreur = "L'utilisateur a eter ajouter avec succés";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $sitename ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo $iconsite ?>" type="image/x-icon"/>

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
	<?php include('../admin/includes/navbar.php');?>	
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
								<a href="../index.php">Index</a>
							</li>
						</ul>
					</div><!--HEADER-->
							
			<div class="row">
				<div class="col-md-8">
					<div class="card">
							<div class="card-header">
								<h4 class="card-title"><center>Administration des utilisateurs</center></h4>
							</div>
								<div class='card-body'>
									<div class='table-responsive'>
										<table id='basic-datatables' class='display table table-striped table-hover'>
											<thead>
												<tr>
													<th><b><font color='#FFF'>ID</th></font></b>
													<th><b><font color='#FFF'>AVATAR</th></font></b>
													<th><b><font color='#FFF'>PSEUDO</th></font></b>
													<th><b><font color='#FFF'>INSCRIPTION</th></font></b>
													<th><b><font color='#FFF'>SUPPRIMER</th></font></b>
												</tr>
											</thead>
											<?php 
											$reponse = $bdd->query('SELECT * FROM users ORDER BY id ASC'); while ($donnees = $reponse->fetch()) {
											echo "
											<tbody>
												<tr>
													<td><font color='#FFF'>".$donnees['id']."</td></font></b>
													<td><font color='#FFF'><img height='42px' width='42px' src='../uploads/avatar/".$donnees['avatar']."'></td></font></b>
													<td><font color='#FFF'><i class='".$donnees['icon']."'></i> <a href='../pages/profil.php?=".$donnees['id']."'>".$donnees['username']."</a> ".$donnees['groupe']."</td></font></b>
													<td><font color='#FFF'>(".$donnees['date'].")</td></font></b><td>
													<form method='POST' action='' enctype='multipart/form-data'>
														<input type='submit' name='deladmin' class='btn btn-danger' placeholder='Supprimer' value='".$donnees['id']."'>
													</form>
													</td>
												</tr>";?>
												

											</tbody> <?php } $reponse->closeCursor(); ?>
										</table>
									</div>
								</div> 
							</div>
						</div>
						
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><center>Ajouter un Utilisateur</center></h4>
								</div>
								<div class='card-body'>
								
									<form method="POST" action="" enctype="multipart/form-data">
										<div class="input-group mb-13">
											<input type="text" placeholder=	"ID" name="id" class="form-control" value="<?php if(isset($id)) { echo $id; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="text" placeholder="Pseudo" name="pseudo" class="form-control" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="text" placeholder="Email" name="mail" class="form-control" value="<?php if(isset($mail)) { echo $mail; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="text" placeholder="Email" name="mail2" class="form-control" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="password" placeholder="MDP" name="mdp" class="form-control" value="<?php if(isset($mdp)) { echo $mdp; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="password" placeholder="MDP CONF" name="mdp2" class="form-control" value="<?php if(isset($mdp2)) { echo $mdp2; } ?>">
											</div> 
											<?php if(isset($erreur)) { echo '<b><p><center><font color="green">'.$erreur."</font></center></b></p>"; }?>
								</div> 	

									<div class="card-footer">
										<center><input name="addadmin" type="submit" class="btn btn-primary" value="Ajouter"></center>
									</div>
								</form>
								
							</div> 
						</div>
				</div>
			</div>
		</div><!--ROW-->
	</div><!--CONTENT-->

<?php include('../admin/includes/footer.php');?>
		</div><!--MAIN PANEL-->
 <?php include('../include/theme.php');?>

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
</div>
</body>
</html>
<?php $reponse->closeCursor(); ?>
