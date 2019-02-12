<?php
$db = new Mypdo();
$questionManager = new QuestionManager($db);
$sujetManager = new SujetManager($db);
$examenManager = new ExamenManager($db);
$reponseEleveManager = new ReponseEleveManager($db);

$idSujet = $_GET['idSujet'];

if(isset($idSujet)) {

	if($sujetManager->exists($idSujet)){

		$personneManager = new PersonneManager($db);
		$personne = $personneManager->getNomPrenomParSujet($idSujet);

		$questions = $questionManager->getAllQuestion($idSujet);

		$sujet = $sujetManager->getSujet($idSujet);
		$examenSujet = $examenManager->getExamen($sujet->getIdExamenOfSujet());

		$listeReponses = $reponseEleveManager->getAllReponseEleve($idSujet);

		if (isset($_SESSION['eleve']) && !$examenSujet->estFini()) { ?>
			<h4 style="margin-top:30px">Résultats attendus : </h4>
			<p>La date de dépôt du sujet n'est pas encore passée</p>

		<?php
		}else{ ?>
			<h4 style="margin-top:30px">Résultats attendus : </h4>
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

			<?php
		} ?>

			<h4> Résultats saisis par l'élève : </h4>

			<?php
			if(!$listeReponses){ ?>

				<p style="text-align:center;font-weight:bold; margin:10% 0;">
					<img src="image/erreur.png" alt="erreur">
					Aucune réponse saisie par l'élève
				</p>

			<?php
			} else { ?>
				<div class="col-12 listImportStudent">

					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th scope="col" style="border-radius: 20px 0 0 0;">Date de saisie</th>
								<th scope="col">Question n°</th>
								<th scope="col">Résultat saisi</th>
								<th scope="col">Exposant du résultat</th>
								<th scope="col">Unité</th>
								<th scope="col">Exposant de l'unité</th>
								<th scope="col">Justification</th>
								<th scope="col" style="border-radius: 0 20px 0 0;">Précision</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($listeReponses as $reponse) { ?>
								<tr>
									<td><?php echo getFrenchDate($reponse->getDateResult()) ?></td>
									<td><?php echo $reponse->getIdQuestion() ?></td>
									<td><?php echo $reponse->getResultat() ?></td>
									<td><?php echo $reponse->getResultatUnite() ?></td>
									<td><?php echo $reponse->getExposantUnite() ?></td>
									<td><?php echo $reponse->getResultatExposant() ?></td>
									<td style="overflow-wrap: break-word;max-width:400px"><?php echo $reponse->getJustification() ?></td>
									<td><?php echo $reponse->getPrecisionReponse() ?> %</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			<?php
		 	}

	} else {
		header('Location: index.php?page=3');
	}

} else {
	header('Location: index.php?page=3');
} ?>
