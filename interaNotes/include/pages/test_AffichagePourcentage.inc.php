<?php
require_once("include/verifEnseignant.inc.php");

$db = new Mypdo();
$examenManager = new ExamenManager($db);

$reponseEleveManager = new ReponseEleveManager($db);
$listeExamens = $examenManager->getAllExamens();

if(!$listeExamens) { ?>

	<p style="text-align:center;font-weight:bold; margin:10% 0;">
		<img src="image/erreur.png" alt="erreur.png">
		Aucun examen créé
	</p>

	<?php } else {

		if(!isset($_GET['id'])) { ?>

			<table style="width:100%">
				<tr>
					<th>#</th>
					<th>dateDepot</th>
					<th>Année</th>
				</tr>
				<?php foreach ($listeExamens as $attribut => $value) { ?>
					<tr>
						<td><?php echo $value->getIdExamen() ?></td>
						<td><?php echo $value->getDateDepotExamen() ?></td>
						<td><?php echo $value->getAnneeScolaireExamen() ?></td>
						<td><a href="index.php?page=18&amp;id=<?php echo $value->getIdExamen();?>"><button>Consulter</button></a></td>
					</tr>
				<?php } ?>
			</table>

		<?php } elseif (!isset($_GET['idSujet'])) {

			$pdo = new Mypdo();
			$sujetManager = new SujetManager($pdo);
			$personneManager = new PersonneManager($pdo);

			$listeSujets = $sujetManager->getAllSujetsOfExamen($_SESSION['examen']->getIdExamen());
			?>

			<div class="listerSujet">
				<?php // WARNING: BLOC A LAISSER ?>
				<div class="row justify-content-around text-center teteListeSujet">
					<div class="col-6 col-sm-3 col-lg-2 textListeSujet">
						<p> </p>
					</div>
					<div class="col-6 col-lg-4">
						<span id="attributeTo">Attribué à : </span>
					</div>
					<div class="col-3 col-lg-2">
					</div>
				</div>

    <?php // WARNING: BLOC A GENERER EN PHP
    foreach ($listeSujets as $sujet) { ?>
    	<div class="row justify-content-center text-center contenuListeSujet">
    		<div class="col-6 col-sm-3 col-lg-2 textListeSujet">
    			<p>Sujet n°<?php echo $sujet->getIdSujet() ?></p>
    		</div>

    		<?php $eleve = $personneManager->getNomPrenomParSujet($sujet->getIdSujet()); ?>

    		<div class="col-6 col-lg-4 textListeSujet">
    			<p> <?php echo $eleve->getPrenomPersonne()." ".$eleve->getNomPersonne() ?></p>
    		</div>

    		<div class="col-6 col-sm-3 col-lg-2 buttonConsulter">
    			<a href="index.php?page=18&amp;id=<?php echo $_GET['id']?>&amp;idSujet=<?php echo $sujet->getIdSujet() ?>"><input type="button" name="" value="Consulter Réponses"></a>
    		</div>
    	</div>
    	<?php
    } ?>

</div>
<?php } else {
	$listeReponses = $reponseEleveManager->getAllReponseEleve($_GET['idSujet']);

	if(!$listeReponses){
		?><p>L'élève n'a saisi aucune réponse</p><?php
	} else { ?>
		<table style="width:100%">
			<tr>
				<th>Date de saisie</th>
				<th>Question N°</th>
				<th>Résultat saisi</th>
				<th>Unité du résultat</th>
				<th>Exposant du résultat</th>
				<th>Justification</th>
				<th>Précision</th>
			</tr>
			<?php foreach ($listeReponses as $attribut => $value) { ?>
				<tr>
					<td><?php echo $value->getDateResult()?></td>
					<td><?php echo $value->getIdReponse() ?></td>
					<td><?php echo $value->getResultat() ?></td>
					<td><?php echo $value->getResultatUnite() ?></td>
					<td><?php echo $value->getExposantUnite() ?></td>
					<td><?php echo $value->getJustification() ?></td>
					<td><?php echo $value->getPrecisionReponse() ?></td>
				</tr>
			<?php }
		} ?>
	</table>
<?php }
} ?>
