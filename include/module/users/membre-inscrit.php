<?php	

    try 
	{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
	}
	catch(Exception $e) 
	{ 
	die('Erreur : '.$e->getMessage());
	}
?>


	<div class='card'>
		<div class='card-body'>
			<div class='titre-inscrit'>Derniers membres inscrits
				<button class='btn btn-icon btn-round btn-default btn-xs float-right' type='button' data-target='#reduire1' data-toggle='collapse' aria-expanded='true' aria-controls='reduire1'><i class='fa fa-minus'></i></button>
			</div>
			
			<section id='reduire1' class='ollapse'>
						<div class='card-list'>
						<?php $reponse = $bdd->query('SELECT * FROM users ORDER BY date DESC LIMIT 5'); while ($donnees = $reponse->fetch()) { ?>
					<?php echo"	<div class='item-list'>
								<div class='avatar'>
									<img src='../uploads/avatar/".$donnees['avatar']."' alt='...' class='avatar rounded-circle'>
								</div>
									<div class='info-user ml-3'>
										<div class='pseudo'><b><font size='2px' color='#FFF'><i class='".$donnees['icon']."'></i> ".$donnees['username']."</font> ".$donnees['groupe']."</div>
										<div class='view'><a href='../pages/view_profil.php?id=".$donnees['id']."'>Voir le profil </div></a>
									</div>
							</div>";?> <?php } $reponse->closeCursor(); ?>
						</div>
			</section>
			
		</div>
	</div>
