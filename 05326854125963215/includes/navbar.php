<?php
include('../include/config.php');
include('../includes/db/auth_admin.php');

$bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth', 'mc_auth', 'D23btGB36wU27d1g');

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   
}
?>

	<div class="main-header">
		<!-- Logo Header -->
		<div class="logo-header" style="background-color: #0f1117;">
			<a href="../05326854125963215/index.php?id=&amp;" class="logo">
				<img src="<?php echo $logosite?>" width="50px" height="35px" alt="navbar brand" class="navbar-brand">
				<font color="WHITE"></font>
			</a>
			<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="icon-menu"></i>
				</span>
			</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
		</div>
		<!-- End Logo Header -->
		
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background-color: #0f1117;">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

					
					<?php
					if (isset($_SESSION['id']) AND isset($_SESSION['username']))
					{
					echo "
					<li class='nav-item dropdown hidden-caret'>
						   <a class='dropdown-toggle profile-pic' data-toggle='dropdown' href='#' aria-expanded='false'>
								<div class='avatar-sm'>
									<img src='../uploads/avatar/".$user['avatar']." ' alt='...' class='avatar-img rounded-circle'>
								</div>
							</a>
							<a class='dropdown-toggle profile-pic' data-toggle='dropdown' href='#' aria-expanded='false'>
							
							</a>
							<ul class='dropdown-menu dropdown-user'>
								<div class='dropdown-user-scroll scrollbar-outer'>
						<li>
									
									<li>
										<div class='dropdown-divider'></div>
										<a class='dropdown-item' href='../pages/profil.php?id=&amp;".$user['id']."_users=".$user['username']."'>Paramètres</a>
										<div class='dropdown-divider'></div>
										<a class='dropdown-item' href='../pages/logout.php'>Déconnexion</a>	
									</li>
									 
									</li>
								</div>
							</ul>
						</li>";
					}?>
					</ul>
			</div>
		</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" style="background-color: #0f1117;">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
				
					<?php 
					if (isset($_SESSION['id']) AND isset($_SESSION['username']))
					{
					echo "
					<div class='user'>
						<div class='info'>

						<div class='avatar avatar-online avatar-sm float-left mr-3'>
							<img src='/uploads/avatar/".$user['avatar']."' alt='...' class='avatar-img rounded-circle'>
						</div>
								<a>
								<span>";
									echo '<font color="white ">'  .$user['username'].  '</font>';
									
									echo "
									<span class='user-level'>";
									echo '<font color="white ">'  .$user['groupe'].  '</font>';
									echo "
									</span>
								</span>
							</a>
						</div>
					</div>";
					}?>
					
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
						<li class='nav-section'>
							<h4 class="text-section"><?php echo $nomnavigation?></h4>
						</li>
						<li class="nav-item">
							<a href="../05326854125963215/gestion-users.php">
								<i class="fas fa-users"></i>
								<p>Gestion des membres</p>
							</a>
							
						<a href="../05326854125963215/gestion-serveur.php">
							<i class="fas fa-server"></i>
								<p>Gestion des serveurs</p>
							</a>
							<a href="../05326854125963215/gestion-update.php">
								<i class="fas fa-bullhorn"></i>
								<p>Gestion des updates</p>
							</a>
						</li>
										
					</ul>
				</div>
			</li>
		</div>
	</div>


<!-- End Sidebar -->