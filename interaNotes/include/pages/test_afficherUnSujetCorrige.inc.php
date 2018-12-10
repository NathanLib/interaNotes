<?php
$db = new Mypdo();
$corrigeManager = new CorrigeManager($db);
$questionManager = new QuestionManager($db);

$personneManager = new PersonneManager($db);
$personne = $personneManager->getNomPrenomParSujet($_GET['id']);
//echo "<pre>";var_dump($corrigeManager->calculerCorrection($_GET['id']));echo "</pre>";
?>
<h1>Sujet <?php echo $_GET['id'];?> - Elève : <?php echo $personne->getPrenomPersonne()." ".$personne->getNomPersonne();?> </h1>
<div class="correctionSujet">
	<?php // WARNING: BLOC A LAISSER ?>
	<div class="row justify-content-around text-center teteCorrectionSujet">
		<div class="col-5 col-sm-3 col-lg-2 textCorrectionSujet">
			<p>Question</p>
		</div>
		<div class="col-3 col-sm-3 col-lg-2 textCorrectionSujet">
			<p>Réponse</p>
		</div>
		<div class="col-2 col-sm-3 col-lg-2 textCorrectionSujet">
			<p>Exposant</p>
		</div>
		<div class="col-2 col-sm-3 col-lg-2 textCorrectionSujet">
			<p>Unité</p>
		</div>
	</div>

	<?php
	$questions = $questionManager->getAllQuestion($_GET['id']);?>

	<div class="row justify-content-around text-center contenuCorrectionSujet">
		<div class="col-5 col-sm-3 col-lg-2 textCorrectionSujet">
			<?php foreach ($questions as $question) {
				$intitule = $question->getIntituleQuestion();?>

				<p><?php echo $intitule; ?></p>
			<?php } ?>
		</div>
		<div class="col-3 col-sm-3 col-lg-2 textCorrectionSujet">
			<?php foreach ($questions as $question) {
				$resultat = $question->getResultat();?>

				<p><?php echo $resultat; ?></p>
			<?php } ?>
		</div>
		<div class="col-2 col-sm-3 col-lg-2 textCorrectionSujet">
			<?php foreach ($questions as $question) {
				$exposant = $question->getExposantUnite();?>

				<p><?php echo $exposant; ?></p>
			<?php } ?>
		</div>
		<div class="col-2 col-sm-3 col-lg-2 textCorrectionSujet">
			<?php foreach ($questions as $question) {
				$unite = $question->getResultatUnite();?>

				<p><?php echo $unite; ?></p>
			<?php } ?>
		</div>
	</div>


</div>