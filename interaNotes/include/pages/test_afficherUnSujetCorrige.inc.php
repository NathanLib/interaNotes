<?php

require_once("include/verifEnseignant.inc.php");

$db = new Mypdo();
$corrigeManager = new CorrigeManager($db);
$questionManager = new QuestionManager($db);

$personneManager = new PersonneManager($db);
$personne = $personneManager->getNomPrenomParSujet($_GET['id']);
//echo "<pre>";var_dump($corrigeManager->calculerCorrection($_GET['id']));echo "</pre>";
?>
<h1 style="margin:3% 0; text-align:center">Sujet <?php echo $_GET['id'];?> - Elève : <?php echo $personne->getPrenomPersonne()." ".$personne->getNomPersonne();?> </h1>
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

<br><br>

<div class="row d-flex justify-content-center correctionSujet">
	<div class="col-12 listImportStudent">

		<table class="table table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col" style="border-radius: 20px 0 0 0;">Question</th>
					<th scope="col">Réponse</th>
					<th scope="col">Exposant</th>
					<th scope="col" style="border-radius: 0 20px 0 0;">Unité</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>
						<?php foreach ($questions as $question) {
							$intitule = $question->getIntituleQuestion();?>

							<p><?php echo $intitule; ?></p>
						<?php } ?>
					</td>
					<td>
						<?php foreach ($questions as $question) {
							$resultat = $question->getResultat();?>

							<p><?php echo $resultat; ?></p>
						<?php } ?>
					</td>
					<td>
						<?php foreach ($questions as $question) {
							$exposant = $question->getExposantUnite();?>

							<p><?php echo $exposant; ?></p>
						<?php } ?>
					</td>
					<td>
						<?php foreach ($questions as $question) {
							$unite = $question->getResultatUnite();?>

							<p><?php echo $unite; ?></p>
						<?php } ?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>


</div>
