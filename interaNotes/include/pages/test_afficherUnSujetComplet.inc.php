<!--Remplacer chaque valeur par des données provenant de la bd (jeu d'essai)-->

<?php
	$db = new Mypdo();
	$sujetManager = new SujetManager($db);
	$valeurManager = new ValeurManager($db);
	$pointManager = new PointManager($db);

	$sujet = $sujetManager->recupererSujetComplet(1); //WARNING RENDRE DYNAMIQUE VIA GET
	?>

<div id="sujet">
  <p>Titre : <?php echo $sujet->titre; ?> </p>
  <p>Date de fin : <?php echo $sujet->dateDepot; ?> </p>
  <p>Consignes : <?php echo $sujet->consigne; ?> </p>
  <p>Valeurs du sujets : </p>
  <?php
  	$valeurs = $valeurManager->getValeurSujet(1); //WARNING RENDRE DYNAMIQUE VIA GET
		foreach ($valeurs as $attribut => $value) {
			$idPoint = $valeurManager->getIdPointFromValeur($value->getIdValeur());
			$point = $pointManager->getPoint($idPoint);
		?>
			<p> <?php echo $point->getNomPoint()." = ".$valeurManager->getValeur($value->getIdValeur())." ".$point->getUnitePoint(); ?> </p>
		<?php } ?>
</div>
