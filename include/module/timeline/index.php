<?php   
	try 
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
}
	catch(Exception $e) 
{ 
	die('Erreur : '.$e->getMessage());
}
	$reponse = $bdd->query('SELECT * FROM update_news ORDER BY date DESC');
?>
<div class="card-header">
	<h4 class="card-title"><center>MISE A JOUR & PATCH NOTES</center></h4>
	</div>

<ul class='timeline'>
<?php while ($donnees = $reponse->fetch()) { 
echo "
	<li class='timeline".$donnees['timeline iverted']."'>
		<div class='timeline-badge ".$donnees['color_icon']."' <i class='".$donnees['icon_news']."'></i></div>
			<div class='timeline-panel' style='background-color: #0a465d;'>
				<div class='timeline-heading'>
					<center><h4 class='timeline-title'><font color='".$donnees['titre_color']."'>".$donnees['titre_news']."</b></font></h4></center>
				</div>
			<div class='timeline-body'>
				<p><font color='#fff'>".$donnees['contenue_news']."</font></p>
			</div>
			<div class='news-footer'>
			<p><div class='avatar-news float-left'><img class='rounded-circle' height='48' width='48' src='../uploads/avatar/".$donnees['avatar']."'/></div> <div class='date-news float-right'><font color='#fff'>(".$donnees['date'].")</div> </font> <a href='../pages/view_profil.php?id=".$donnees['id']."'>".$donnees['username']."</a></p>
			</div>
	</li>";
	} $reponse->closeCursor();
?>
</ul>
<div class="card-footer">

</div>
