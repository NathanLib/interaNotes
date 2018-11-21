<!--Remplacer chaque valeur par des données provenant de la bd (jeu d'essai)-->

<?php
	$db = new Mypdo();
	$sujetManager = new SujetManager($db);
	$valeurManager = new ValeurManager($db);
	$pointManager = new PointManager($db);

	$sujet = $sujetManager->recupererSujet(1);
	?>

<div id="sujet">
  <p>Titre : <?php echo $sujet->titre; ?> </p>
  <p>Date de fin : <?php echo $sujet->dateDepot; ?> </p>
  <p>Consignes : <?php echo $sujet->consigne; ?> </p>
  <p>Valeurs du sujets : </p>
  <?php
  	$valeurs = $valeurManager->getValeurSujet(1);

		foreach ($valeurs as $attribut => $value) {
			$point = $valeurManager->getPointFromValeur($value->getIdValeur());?>
			<p> <?php echo $pointManager->getPoint($point)->nomPoint." = ".$valeurManager->getValeur($value->getIdValeur())." ".$pointManager->getPoint($point)->unitePoint; ?> </p>
		<?php } ?>
</div>
