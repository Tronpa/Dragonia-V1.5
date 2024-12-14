<?php 
session_start(); 
include('../05326854125963215/includes/config.php');
include('../05326854125963215/includes/db/auth_admin.php');

$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
$reponse = $bdd->query('SELECT * FROM users ORDER BY id ASC');
if(isset($_GET['type']) AND $_GET['type'] == 'users') {

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
      $req->execute(array($supprime));
}

}

if(isset($_POST['addadmin'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO users(username, password) VALUES(?, ?)");
                     $insertmbr->execute(array($pseudo, $mdp));
                     $erreur = "L'utilisateur a eter ajouter avec succés";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $sitename ?></title>
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
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
	<?php include('../05326854125963215/includes/navbar.php');?>	
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
							<div class="card-header" style="background-color: #9e0d0d;">
								<h4 class="card-title"><center>Administration des utilisateurs</center></h4>
							</div>
								<div class="card-body" style="background-color: #0f1117;">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th><b><font color="#FFF">ID</th></font></b>
													<th><b><font color="#FFF">AVATAR</th></font></b>
													<th><b><font color="#FFF">PSEUDO</th></font></b>
													<th><b><font color="#FFF">INSCRIPTION</th></font></b>
													<th><b><font color="#FFF">ACTION</th></font></b>
												</tr>
											</thead>
											<?php 
											while ($d = $donnees = $reponse->fetch()) {
											echo "
											<tbody>
												<tr>
													<td><font color='#FFF'>".$d['id']."</td></font></b>
													<td><font color='#FFF'><img height='42px' width='42px' src='../uploads/avatar/".$d['avatar']."' class='rounded-circle'></td></font></b>
													<td><font color='#FFF'><i class='".$d['icon']."'></i> <a href='../pages/view_profil.php?id=".$d['id']."'>".$d['username']."</a> <font size='1px' color='".$donnees['color_groupe']."'>(".$donnees['groupe'].")</td></font></b>
													<td><font color='#FFF'>(".$d['date'].")</td></font></b><td>
													<form method='POST' action='' enctype='multipart/form-data'>
														<a href='gestion-users.php?type=users&supprime=".$d['id']."'>Supprimer</a>
													</form>
													</td>
												</tr>";?>
												

											</tbody> <?php } $reponse->closeCursor(); ?>
										</table>
									</div>
								</div> 
								<div class="card-footer" style="background-color: #9e0d0d;">
								<center></center>
								</div>
							</div>
						</div>
						
					<div class="col-md-4">
						<div class="card">
							<div class="card-header" style="background-color: #9e0d0d;">
								<h4 class="card-title"><center>Ajouter un Utilisateur</center></h4>
								</div>
								<div class="card-body" style="background-color: #0f1117;">
								
									<form method="POST" action="" enctype="multipart/form-data">		
											<div class="input-group mb-13">
												<input type="text" placeholder="Pseudo" name="pseudo" class="form-control" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="password" placeholder="MDP" name="mdp" class="form-control" value="<?php if(isset($mdp)) { echo $mdp; } ?>">
											</div> 
											
											<div class="input-group mb-13">
												<input type="password" placeholder="MDP CONF" name="mdp2" class="form-control" value="<?php if(isset($mdp2)) { echo $mdp2; } ?>">
											</div> 
											<?php if(isset($erreur)) { echo '<b><p><center><font color="green">'.$erreur."</font></center></b></p>"; }?>
								</div> 	

									<div class="card-footer" style="background-color: #9e0d0d;">
										<center><input name="addadmin" type="submit" class="btn btn-primary" value="Ajouter"></center>
									</div>
								</form>
								
							</div> 
						</div>
				</div>
			</div>
		</div><!--ROW-->
	</div><!--CONTENT-->

<?php include('../05326854125963215/includes/footer.php');?>
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
</div>
</body>
</html>
<?php $reponse->closeCursor(); ?>
