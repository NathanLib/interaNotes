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

		// WARNING: PARTIE ELEVE
		case 10:
		include_once('pages/eleve_accueil.inc.php');
		break;

		case 11:
		include_once('pages/eleve_afficherSujet.inc.php');
		break;

		// WARNING: PARTIE TEST

		case 20:
		include_once('pages/test_afficherUnSujetComplet.inc.php');
		break;

		case 21:
		include_once('pages/test_afficherUnSujetCorrige.inc.php');
		break;

		case 22:
		include_once('pages/test_generationSujets.inc.php');
		break;

		case 23:
		include_once('pages/test_saisiReponseEleve.inc.php');
		break;

		case 24:
		include_once('pages/test_publipostage.inc.php');
		break;

		case 25:
		include_once('pages/test_AffichagePourcentage.inc.php');
		break;

		case 26:
		include_once('pages/detailsCompte.inc.php');
		break;


		// WARNING : Pages communes

		case 40:
		include_once('pages/deconnexion.inc.php');
		break;

		default:
		if(isset($_SESSION['eleve'])){

			header('Location: index.php?page=10');

		} elseif (isset($_SESSION['enseignant'])) {

			header('Location: index.php?page=1');

		} else {

			header('Location: index.php?page=0');

		}
		break;
	}

	?>
</div>
