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


	<div class="card" style="background-color: #0f1117;">
		<div class="card-body">
			<div class="titre-inscrit" style="font-size: 12px;">Utilisateur(s) en Ligne
				<button class="btn btn-icon btn-round btn-default btn-xs float-right" type="button" data-target="#reduire1" data-toggle="collapse" aria-expanded="true" aria-controls="reduire1"><i class="fa fa-minus"></i></button>
			</div>
			
			<section id="reduire1" class="ollapse">
						<div class="card-list">
						<?php $reponse = $bdd->query('SELECT * FROM online ORDER BY id'); while ($donnees = $reponse->fetch()) { ?>
					<?php echo"	<div class='item-list'>
								<div class='avatar'>
									<img style='border: solid; border-color: #00d0ff9c;' src='../uploads/avatar/".$donnees['avatar']."' alt='...' class='avatar rounded-circle'/>
								</div>
									<div class='info-user ml-3'> 
										<div class='pseudo'><font color='white'><a href='../pages/view_profil.php?id=".$donnees['id']."'> ".$donnees['username']."</a> </font></div>
									</div>
							</div>";?> <?php } $reponse->closeCursor(); ?>
						</div>
			</section>
			
		</div>
		<div class="card-footer">
		</div>
	</div>
