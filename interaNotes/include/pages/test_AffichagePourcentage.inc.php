<?php
require_once("include/verifEnseignant.inc.php");

if (isset($_GET['idSujet'])) {

	$db = new Mypdo();
	$examenManager = new ExamenManager($db);
	$reponseEleveManager = new ReponseEleveManager($db);
	$sujetManager = new SujetManager($db);
	$personneManager = new PersonneManager($db);

	$listeReponses = $reponseEleveManager->getAllReponseEleve($_GET['idSujet']);

	if(!$listeReponses){ ?>
		<p style="text-align:center;font-weight:bold; margin:10% 0;">
			<img src="image/erreur.png" alt="erreur">
			Aucune réponse saisie par l'élève
		</p>

		<?php
	} else { ?>
		<h4 style="margin-top:30px;">Réponses saisies par l'étudiant :</h4>
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
							<td><?php echo $reponse->getResultatExposant() ?></td>
							<td><?php echo $reponse->getResultatUnite() ?></td>
							<td><?php echo $reponse->getExposantUnite() ?></td>
							<td><?php echo $reponse->getJustification() ?></td>
							<td><?php echo $reponse->getPrecisionReponse() ?> %</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	<?php }
}else{
	header('Location: index.php?page=5');
}?>
