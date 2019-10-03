<?php 
include('../include/config.php');
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $id = $_SESSION['id'];
   $user = $requser->fetch();

   
if(isset($_POST['textuel_video']) AND isset($_SESSION['id']) AND !empty($_POST['message'])) {

   $id = htmlspecialchars($_SESSION['id']);
   $username = htmlspecialchars($_SESSION['username']);
   $avatar = htmlspecialchars($_SESSION['avatar']);
   $groupe = htmlspecialchars($_SESSION['groupe']);
   $color_groupe = htmlspecialchars($_SESSION['color_groupe']);
   $color = htmlspecialchars($_SESSION['color']);
   $icon = htmlspecialchars($_SESSION['icon']);
   $message = htmlspecialchars($_POST['message']);
   $reqmessage = $bdd->prepare("SELECT * FROM textuel_video WHERE id = ?");
   $reqmessage->execute(array($id));
   $insertmbr = $bdd->prepare("INSERT INTO textuel_video(id, username, avatar, groupe, color_groupe, color, icon, message) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
   $insertmbr->execute(array($id, $username, $avatar, $groupe, $color_groupe, $color, $icon, $message));
   header("location: salon_textuel_video.php?id=".$_SESSION['id']."");

}

}

$reponse = $bdd->query('SELECT * FROM textuel_video ORDER BY date ASC LIMIT 20') or die(print_r($bdd->errorInfo()));
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
				<div style="background-image: url('https://tronpa.fr/assets/img/1.jpg'); background-repeat: no-repeat;" class="page-inner">
				
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
								<a href="../index.php">Salon Textuel-Video</a>
							</li>
						</ul>
					</div><!--HEADER-->
							
						<div class="row">
							<div class="card col-md-9" style="background-color: #0f1117;">
								<div class="card-header">
									<div class="card-title"><center>Salon Textuel (BETA #Salon_Video)</center></div>
								</div>
								
								<div class='card-body'>

								
								<?php while ($donnees = $reponse->fetch()) {
								echo "
								<div class='avatar-salon-textuel'>
									<img class='rounded-circle' height='48' width='48' src='../uploads/avatar/".$donnees['avatar']."'/>
								</div>	
								
								<div class='pseudo-salon-textuel'>
									<font size='2px' color='#fff'><b><i class='".$donnees['icon']."'></i><a href='../pages/view_profil.php?id=".$donnees['id']."'>".$donnees['username']."</a></font> <font size='1px' color='".$donnees['color_groupe']."'>(".$donnees['groupe'].")</font> <font size='1px' color='white'>(".$donnees['date'].")</b></font>
								</div>	
							
								<div class='message-salon-textuel'>
									<font size='2px' color='#fff'> ".$donnees['message']."</font>
								</div>";
								
								?> <?php } $reponse->closeCursor(); ?>

							<form action="" method="post" enctype="multipart/form-data">
								<div class="card-footer">
									<div class="form-group">
										<textarea class="form-control" name="message" rows="5"></textarea>
									</div>
									<button name="textuel_video" class="btn btn-default">Envoyer</button>
								</div>
							</form>
								<center><p><font size='5px' color='red'></font></p></center>
							</div>
						</div>

				<div class='col-md-3 ml-auto'>
					<div class="modules">
						<?php include('../include/module/users/membre-en-ligne.php');?>
						<?php include('../include/module/users/liste-salons.php');?>
					</div>
				</div>		
			</div>
		</div><!--ROW-->
	</div><!--CONTENT-->
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

</div>
</body>
</html>