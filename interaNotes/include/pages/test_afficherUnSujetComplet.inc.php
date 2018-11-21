<?php
$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);

$valeurManager = new ValeurManager($pdo);
$pointManager = new PointManager($pdo);

$sujet = $sujetManager->getSujet(1); //WARNING RENDRE DYNAMIQUE VIA GET
$enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());
?>

<div id="sujet">
  <p>Titre : <?php echo $enonceSujet->getTitreEnonce(); ?> </p>
  <p>Date de fin : <?php echo $_SESSION['examen']->getDateDepotExamen(); ?> </p>
  <p>Consignes : <?php echo $enonceSujet->getConsigneEnonce(); ?> </p>
  <p>Valeurs du sujets : </p>

	<?php
	$valeurs = $valeurManager->getValeursSujet(1); //WARNING RENDRE DYNAMIQUE VIA GET

	foreach ($valeurs as $valeur) {
		$point = $pointManager->getPoint($valeur->getIdPointOfValeur());?>

		<p><?php echo $point->getNomPoint()." = ".$valeur->getValeur()." ".$point->getUnitePoint(); ?></p>
	<?php } ?>
</div>
