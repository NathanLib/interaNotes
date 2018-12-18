<?php

require_once("include/verifEnseignant.inc.php");

$db = new Mypdo();
$corrigeManager = new CorrigeManager($db);
$questionManager = new QuestionManager($db);
$sujetManager = new SujetManager($db);

if(isset(($_GET['id']))) {

	if($sujetManager->exists($_GET['id'])){

		$personneManager = new PersonneManager($db);
$personne = $personneManager->getNomPrenomParSujet($_GET['id']); //WARNING


?>
<h1 style="margin:3% 0; text-align:center">Sujet <?php echo $_GET['id'];?> - Elève : <?php echo $personne->getPrenomPersonne()." ".$personne->getNomPersonne();?> </h1>


<?php $questions = $questionManager->getAllQuestion($_GET['id']);?>

<div class="row d-flex justify-content-center correctionSujet">
	<div class="col-11 listImportStudent">

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


<?php } else {
	header('Location: index.php?page=3');
}
} else {
	header('Location: index.php?page=3');
} ?>
