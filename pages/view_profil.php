<?php
include('../include/config.php');


session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
$req = $bdd->prepare('SELECT id, username, date, avatar, groupe, background, sex, icon, prenom, discord_profil FROM users WHERE id = ?');
$req->execute(array($_GET['id']));


while ($donnees = $req->fetch()) 
	
{
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
	<script type="text/javascript" src="/assets/js/upload_progress.js"></script>
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
								<a href="../profil.php">Modifier mon compte</a>
							</li>
						</ul>
					</div><!--HEADER-->
					
			
			<div class="row">
					<div class="col-md-12">
						<div class="card" style="background-color: #0f1117;">
							<div class="card-header">
								<h4 class="card-title"><center>Vous êtes sur le profil de <?php echo $donnees['username']; ?></center></h4>
							</div>
							
							<div class="card-body" style="background-position: center; background-repeat: no-repeat; background-size: 100% auto; height: 100%; width: auto; background-image: url('../uploads/background/<?php echo $donnees['background']; ?>')">
								<div class="col-md-12" style="height: 500px; top:80px">
					
							<center>
								<div class="avatar1">
									<img style="border: solid; border-color: #00a1ffb8;" src="../uploads/avatar/<?php echo $donnees['avatar']; ?>" id="preview" width="168" height="168" class="rounded-circle">
								</div>
							</center>
							
								<p></p>
								<center>								
									<div class="kjhgkh col-md-2" style="background-color: #000c;"> <font color="#FFF"> <i class="<?php echo $donnees['icon']; ?>"></i> <?php echo $donnees['username']; ?></font> <font size="1px" color="<?php echo $donnees['groupe_color']; ?>">(<?php echo $donnees['groupe']; ?>)</font></div>
									<p></p>
									<div class="prenom col-md-2" style="background-color: #000c;"><font color="#FFF">Prénom: <?php echo $donnees['prenom']; ?></font></div>
				
									<div class="sex col-md-2" style="background-color: #000c;"><font color="#FFF">Genre: <?php echo $donnees['sex']; ?></font></div>
									
									<p></p>
									<div class="job col-md-2" style="background-color: #000c;"><b><font color="#FFFFFF">Enregistré depuis le :</font></b></div>
									<div class="desc col-md-2" style="background-color: #000c;"><b><font color="#FFFFFF">(<?php echo $donnees['date']; ?>)</font></b></div>
									<p></p>
								</center>
							</div>
						</div>
						
					<div class="card-footer col-md-12 mx-auto">
						<form method="POST" action="" enctype="multipart/form-data">
						</form>
					</div>

						</div><!--COL-->
					</div><!--ROW-->
			
				<div class="col-md-4">
					<div class="card" style="background-color: #0f1117;">
						<div class="card-header">
							<h4 class="card-title"><center>Rejoint le disord de <?php echo $donnees['username']; ?></center></h4>
						</div>
							
							<div class="card-body">
								<div class="col-md-12 mx-auto">
									<div class='discord'>
										<iframe src="https://discordapp.com/widget?id=<?php echo $donnees['discord_profil']; ?>&theme=dark" width="100%" height="482" allowtransparency="true" frameborder="0"></iframe>
									</div>
								</div>	
							</div>
							
						<div class="card-footer col-md-12 mx-auto">
							<p></p>
						</div>
						
					</div><!--COL-->
				</div>	

					<div class="col-md-8">
						<div class="card" style="background-color: #0f1117;">
							<div class="card-header">
								<h4 class="card-title"><center>Gaming Card</center></h4>
							</div>
							
							<div class="card-body">
								<div class="col-md-12 mx-auto">
									<div class='gaming-card'>
																	
									</div>
								</div>
							</div>
							
							<center>
							<font color="red"><p>Module en développement</p></font></center>
								<div class="card-footer col-md-12 mx-auto">
							</div>
						</div>	
					</div><!--COL-->		
			</div>
		</div><!--CONTENT-->

	<?php include('../include/footer.php');?>
		</div><!--MAIN PANEL-->

	<!--   Core JS Files   -->

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
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
?>