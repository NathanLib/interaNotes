<?php
$db = new Mypdo();
$corrigeManager = new CorrigeManager($db);
$questionManager = new QuestionManager($db);
$sujetManager = new SujetManager($db);
$enonceManager = new EnonceManager($db);
$examenManager = new ExamenManager($db);
$reponseEleveManager = new ReponseEleveManager($db);


$idSujet = $_GET['id'];

if(isset($idSujet)) {

	if($sujetManager->exists($idSujet)){

		$personneManager = new PersonneManager($db);
		$personne = $personneManager->getNomPrenomParSujet($idSujet); //WARNING

		$questions = $questionManager->getAllQuestion($idSujet);

		$sujet = $sujetManager->getSujet($idSujet);
		$examenSujet = $examenManager->getExamen($sujet->getIdExamenOfSujet());

		$dateDepot = $examenSujet->getDateDepotExamen();
		$dateActuelle = date("Y-m-d H:i:s");

		$listeReponses = $reponseEleveManager->getAllReponseEleve($idSujet);

		?>

		<?php  if ($dateDepot > $dateActuelle) { ?>
			<h1>Erreur</h1>
			<p>La date de fin du sujet n'est pas encore passée</p>
		<?php } else { ?>
			<h1>Résultats attendus : </h1>
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

			<h1> résultats saisis par l'élève</h1>
			<?php if(!$listeReponses){
				?>
				<p style="text-align:center;font-weight:bold; margin:10% 0;">
					<img src="image/erreur.png" alt="erreur">
					Aucune réponse saisie par l'élève
				</p>
				<?php
			} else { ?>
				<table>
					<tr>
						<th>Date de saisie</th>
						<th>Question N°</th>
						<th>Résultat saisi</th>
						<th>Exposant du résultat</th>
						<th>Unité du résultat</th>
						<th>Exposant du résultat</th>
						<th>Justification</th>
						<th>Précision</th>
					</tr>
					<?php foreach ($listeReponses as $reponse) { ?>
						<tr>
							<td><?php echo getFrenchDate($reponse->getDateResult()) ?></td>
							<td><?php echo $reponse->getIdQuestion() ?></td>
							<td><?php echo $reponse->getResultat() ?></td>
							<td><?php echo $reponse->getResultatUnite() ?></td>
							<td><?php echo $reponse->getExposantUnite() ?></td>
							<td><?php echo $reponse->getResultatExposant() ?></td>
							<td><?php echo $reponse->getJustification() ?></td>
							<td><?php echo $reponse->getPrecisionReponse() ?> %</td>
						</tr>
					<?php } ?>
				</table>
				<?php } ?>
			<?php }
		} else {
			header('Location: index.php?page=3');
		}
	} else {
		header('Location: index.php?page=3');
	} ?>
