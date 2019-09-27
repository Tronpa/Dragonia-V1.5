<?php
include('../include/config.php');
include('../include/module/users/count-players.php');
session_start();
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
								<a href="../profil.php">Modifier mon compte</a>
							</li>
						</ul>
					</div>
							
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><center>LISTE DES MEMBRES ENREGISTRER</center></h4>
								</div>

								<div class='card-body'>
									<div class='table-responsive'>
										<table id="#basic-datatables" class='display table table-striped table-hover'>
											<thead>
												<tr>
													<th class="bg-primary"><b><font color='#FFF'>ID</th></font></b>
													<th class="bg-primary"><b><font color='#FFF'>AVATAR</th></font></b>
													<th class="bg-primary"><b><font color='#FFF'>PSEUDO</th></font></b>
													<th class="bg-primary"><b><font color='#FFF'>INSCRIPTION</th></font></b>
													<th class="bg-primary"><b><font color='#FFF'></th></font></b>
												</tr>
											</thead>
											<tbody>
											<?php 
												$reponse = $bdd->query('SELECT * FROM users ORDER BY id ASC'); while ($donnees = $reponse->fetch()) {
												echo "
												<tr>
													<td><font color='#FFF'>".$donnees['id']."</td></font></b>
													<td><img height='48px' width='48px' style='border: solid; border-color: #00d0ff9c; ' src='../uploads/avatar/".$donnees['avatar']."' class='rounded-circle''></td></b>
													<td><font color='#FFF'><i class='".$donnees['icon']."'></i> ".$donnees['username']." ".$donnees['groupe']."</td></font></b>
													<td><font color='#FFF'>(".$donnees['date'].")</td></font></b>
													<td><font color='#FFF'><a href='../pages/view_profil.php?id=".$donnees['id']."'>Voir le profil</td></font></b>
												</tr>";?> <?php } $reponse->closeCursor(); ?>
											</tbody>
										</table>
									</div>
							<div class="card-footer">
								 <p><center><font color="white">Utilisateurs enregistrés</font> <font color="green">[ <?php echo $membercount;?> ]</p></center></font>
							</div>
						</div> 
					</div>
				</div>
			</div><!--ROW-->
		</div>
	</div><!--CONTENT-->

	<?php include('../include/footer.php');?>
	<?php include('../include/theme.php');?>
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

<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#id").val(),
					$("#username").val(),
					$("#avatar").val(),
					$("#date").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</div>
</body>
</html>

