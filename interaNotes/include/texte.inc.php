<div id="texte">
	<?php
	if (!empty($_GET["page"])){
		$page=$_GET["page"];
	}else{
		$page=0;
	}

	switch ($page) {

		// WARNING: CONNEXION
		case 0:
		include_once('pages/connexion.inc.php');
		break;

		// WARNING: PARTIE ENSEIGNANT

		case 1:
		include_once('pages/enseignant_accueil.inc.php');
		break;

		case 2:
		include_once('pages/enseignant_creerClasse.inc.php');
		break;

		case 3:
		include_once('pages/enseignant_listerSujets.inc.php');
		break;

		case 4:
		include_once('pages/enseignant_creerExamen.inc.php');
		break;

		case 5:  header('Location: index.php?page=0');
		break;

		case 6:  header('Location: index.php?page=0');
		break;

		// WARNING: PARTIE ELEVE
		case 7:
		include_once('pages/eleve_accueil.inc.php');
		break;

		case 8:
		include_once('pages/eleve_afficherSujet.inc.php');
		break;

		case 9:  header('Location: index.php?page=0');
		break;

		case 10:  header('Location: index.php?page=0');
		break;


		case 11: header('Location: index.php?page=0');
		break;

		// WARNING: PARTIE TEST

		case 12:
		include_once('pages/test_afficherUnSujetComplet.inc.php');
		break;

		case 13:
		include_once('pages/test_afficherUnSujetCorrige.inc.php');
		break;

		case 14:
		include_once('pages/test_generationSujets.inc.php');
		break;

		case 15:
		include_once('pages/test_saisiReponseEleve.inc.php');
		break;


		// WARNING : DECONNEXION

		case 16:
		include_once('pages/deconnexion.inc.php');
		break;

		// WARNING: Suite PARTIE TEST
		case 17:
		include_once('pages/test_publipostage.inc.php');
		break;

		case 18:
		include_once('pages/test_AffichagePourcentage.inc.php');
		break;

	}

	?>
</div>
