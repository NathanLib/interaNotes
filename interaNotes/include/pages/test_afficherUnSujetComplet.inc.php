<!--Remplacer chaque valeur par des données provenant de la bd (jeu d'essai)-->

<?php $db = new Mypdo();
	$manager = new SujetManager($db);
	$valeurManager = new ValeurManager($db);
	$sujet = $manager->afficherSujet(1);
	?>

<div id="sujet">
  <p>Titre : <?php echo $sujet->titre ?> </p>
  <p>Date de fin : <?php echo $sujet->dateDepot ?> </p>
  <p>Consignes : <?php echo $sujet->consigne ?> </p>
  <p>Valeurs du sujets : </p>
  <?php 
  		$valeurs = $valeurManager->getValeurSujet(1); 
		foreach ($valeurs as $attribut => $value) {
			$point = $valeurManager->getPointFromValeur($value->getIdValeur());
			?> <p> <?php echo $valeurManager->getPoint($point)->nomPoint." = ".$valeurManager->getValeur($value->getIdValeur())." ".$valeurManager->getPoint($point)->unitePoint; ?> </p>
		 <?php } ?>
</div>
