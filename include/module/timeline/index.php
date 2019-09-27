<?php   
	try 
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
}
	catch(Exception $e) 
{ 
	die('Erreur : '.$e->getMessage());
}
	$reponse = $bdd->query('SELECT * FROM update_news ORDER BY date');
?>
<div class="card-header">
	<h4 class="card-title"><center>MISE A JOUR & PATCH NOTES</center></h4>
	</div>

<ul class='timeline'>
<?php while ($donnees = $reponse->fetch()) { 
echo "
	<li class='timeline".$donnees['timeline iverted']."'>
		<div class='timeline-badge ".$donnees['color_icon']."'><i class='".$donnees['icon_news']."'></i></div>
			<div class='timeline-panel'>
				<div class='timeline-heading'>
					<h4 class='timeline-title'><font color='".$donnees['titre_color']."'><b>".$donnees['titre_news']."</b></font></h4>
				</div>
			<div class='timeline-body'>
				<p><font color='#fff'>".$donnees['contenue_news']."</font></p>
			</div>
			<div class='news-footer'>
			<p><img class='rounded-circle' height='48' width='48' src='../uploads/avatar/".$donnees['avatar']."'/> <font color='#fff'>(".$donnees['date'].") par </font> <a href='../pages/view_profil.php?id=".$donnees['id']."'>".$donnees['username']."</a></p>
			</div>
	</li>";
	} $reponse->closeCursor();
?>
</ul>
<div class="card-footer">

</div>
