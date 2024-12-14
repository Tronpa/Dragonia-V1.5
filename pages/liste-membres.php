<?php
include('../include/config.php');
include('../include/module/users/count-players.php');

session_start();

$donnees = $d;
$donnees['id'] = $d['id'];
$donnees['username'] = $d['username'];
$donnees['avatar'] = $d['avatar'];
$donnees['icon'] = $d['icon'];
$donnees['groupe'] = $d['groupe'];
$donnees['color_groupe'] = $d['color_groupe'];
$donnees['date'] = $d['date'];


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $sitename?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo $iconsite?>" type="image/x-icon"/>
	<meta name="autheur" content="ONX_Tronpa" />
	<meta name="contact" content="nitrogene5110@gmail.com" />
	<meta name="version" content="2.0" />
	<meta name="description" content="" />

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
								<a href="../index.php">Serveur</a>
							</li>
						</ul>
					</div><!--HEADER-->
							
					<div class="row">
						<div class="col-md-12">
							<div class="card" style="background-color: #0f1117;">
								<div class="card-header">
									<h4 class="card-title"><center>LISTE DES MEMBRES ENREGISTRER</center></h4>
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<table id="" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th class="bg-primary"><b><font color="#FFF">ID</th></font></b>
													<th class="bg-primary"><b><font color="#FFF">AVATAR</th></font></b>
													<th class="bg-primary"><b><font color="#FFF">PSEUDO</th></font></b>
													<th class="bg-primary"><b><font color="#FFF">INSCRIPTION</th></font></b>
													<th class="bg-primary"><b><font color="#FFF"></th></font></b>
												</tr>
											</thead>
											<tbody>
											<?php
												$reponse = $bdd->query('SELECT * FROM users ORDER BY id ASC'); while ($d = $reponse->fetch()) {
												date_default_timezone_set('Europe/Paris');
												setlocale(LC_TIME, 'fr_FR','French');

												echo "
												<tr>
													<td><font color='#FFF'>".$d['id']."</td></font></b>
													<td><img height='48px' width='48px' style='border: solid; border-color: #00d0ff9c; ' src='../uploads/avatar/".$d['avatar']."' class='rounded-circle''></td></b>
													<td><font color='#FFF'><i class='".$d['icon']."'></i> ".$d['username']." </font><font size='1px' color=".$d['color_groupe'].">(".$d['groupe'].")</td></font></b>
													<td><font color='#FFF'> ".$d['date']." </td></font></b>
													<td><font color='#FFF'><a href='../pages/view_profil.php?id=".$d['id']."'>Voir le profil</td></font></b>
												</tr>";?> <?php } $reponse->closeCursor(); ?>
											</tbody>
										</table>
									</div>
									<div class="card-footer">
									<p></p>
								 <p><center><font color="white">Utilisateurs enregistrés</font> <font color="green">[ <?php echo $membercount;?> ]</p></center></font>
							</div>
						</div> 
					</div>
				</div>
			</div><!--ROW-->
		</div><!--ROW-->
	</div><!--CONTENT-->

		<?php include('../include/module/users/user_nbr_live.php'); ?>
		<footer class="footer1 col-md-12 mx-auto" style="background-color: #0f1117; top: 10px;">
		<div class="copyright float-left col-md-4">
		<font color="white">Actuellement <?php echo $user_nbr; ?> utilisateur<?php if($user_nbr != 1) { echo "s"; } ?> en ligne <br />
		</div>
		<div class="copyright col-md-6 mx-auto">
			<center><font color="white">© 2018-2019 développé par <a href='https://steamcommunity.com/profiles/76561198007132503/'>ONX_Tronpa</a> <i class='fa fa-heart heart text-danger'></i></font></center>
		</div>		
		</footer>
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

