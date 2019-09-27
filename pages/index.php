<?php 
include('../include/config.php');

$cookie_name = "tronpa";
// On génère quelque chose d'aléatoire
$ticket = session_id().microtime().rand(0,9999999999);
// on hash pour avoir quelque chose de propre qui aura toujours la même forme
$ticket = hash('sha512', $ticket);

// On enregistre des deux cotés
setcookie($cookie_name, $ticket, time() + (60 * 20)); // Expire au bout de 20 min
$_SESSION['ticket'] = $ticket;


session_start(); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
								<a href="../index.php">Serveur</a>
							</li>
						</ul>
					</div><!--HEADER-->
							
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<?php include('../include/module/carousel/index.php');?>
						</div>
					</div>
				</div>
				
							<div class="card col-md-9">
								<div class="card-header">
									<div class="card-title"><center>Liste des serveurs</center></div>
								</div>
								<div class="card-body">
									<table class="table table-head-bg-primary">
										<thead>
											<tr>
												<th scope="col">OS</th>
												<th scope="col">GAMES</th>
												<th scope="col">HOSTNAME</th>
												<th scope="col">PLAYERS</th>
												<th scope="col">MAPS</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><img src="../assets/img/linux-icon.png" height="24" width="24"/></td>
												<td><img src="../assets/img/280px-Gmodlogo.svg.png" height="24" width="24"/></td>
												<td><b><font color='#00A6FF'>[FR] [FR] SERVEUR GARRYS MOD 1</b></font></td>
												<td><font color='#219711'> 12/64 </font></b></td>
												<td><b><font color='#971399'> ph_restaurant </font></b></td>
											</tr>
											
											<tr>
												<td><img src='../assets/img/linux-icon.png' height='24' width='24'/></td>
												<td><img src='../assets/img/280px-Gmodlogo.svg.png' height='24' width='24'/></td>
												<td><b><font color='#00A6FF'>[FR] SERVEUR GARRYS MOD 2</font></b></td>
												<td><b><font color='#219711'> 28/64</font></b></td>
												<td><b><font color='#971399'> rp_stalker</font></b></td>
											</tr>
											
											<tr>
												<td><img src='../assets/img/linux-icon.png' height='24' width='24'/></font></b></td>
												<td><img src='../assets/img/280px-Gmodlogo.svg.png' height='24' width='24'/></font></b></td>
												<td><b><font color='#00A6FF'>[FR] SERVEUR GARRYS MOD 3</font></b></td>
												<td><b><font color='#219711'> 8/15</font></b></td>
												<td><b><font color='#971399'> mb_meelonbomber</font></b></td>
											</tr>
											
											<tr>
												<td><img src='../assets/img/linux-icon.png' height='24' width='24'/></td>
												<td><img src='../assets/img/minecraft.png' height='24' width='24'/></td>  
												<td><b><font color='#00A6FF'>[FR] SERVEUR MINECRAFT 1</font></b></td>
												<td><b><font color='#219711'> 62/999</font></b></td>
												<td><b><font color='#971399'> word_maps</font></b></td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
			
			<?php include('../include/module/serveur/minecraft.php');?>
			
				<div class='col-md-3 ml-auto'>
					<div class="modules-inscrit">
						<?php include('../include/module/users/membre-inscrit.php');?>
						<?php include('../include/module/users/module-workshop.php');?>
					</div>
				</div>
			</div>
		</div><!--ROW-->
	</div><!--CONTENT-->

<?php include('../include/footer.php');?>
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
