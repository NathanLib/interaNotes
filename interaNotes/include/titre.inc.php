	<?php
	if (!empty($_GET["page"])){
		$page=$_GET["page"];
	}else{
		$page=0;
	}

	switch ($page) {

		// WARNING: CONNEXION
		case 0:
		$_SESSION['titre'] = "Connexion";
		break;

		// WARNING: PARTIE ENSEIGNANT

		case 1:
		$_SESSION['titre'] = "Accueil";
		break;

		case 2:
		$_SESSION['titre'] = "Créer une classe";
		break;

		case 3:
		$_SESSION['titre'] = "Lister les sujets";
		break;

		case 4:
		$_SESSION['titre'] = "Créer un examen";
		break;

		// WARNING: PARTIE ELEVE
		case 7:
		$_SESSION['titre'] = "Accueil";
		break;

		case 8:
		$_SESSION['titre'] = "Mon sujet";
		break;

		// WARNING: PARTIE TEST

		case 12:
		$_SESSION['titre'] = "Test - sujet complet";
		break;

		case 13:
		$_SESSION['titre'] = "Test - sujet corrigé";
		break;

		case 14:
		$_SESSION['titre'] = "Test - génération sujets";
		break;

		case 15:
		$_SESSION['titre'] = "Test - saisie élève";
		break;


		// WARNING : DECONNEXION

		case 16:
		$_SESSION['titre'] = "Déconnexion";
		break;

		// WARNING: Suite PARTIE TEST
		case 17:
		$_SESSION['titre'] = "Test - Publipostage";
		break;

		case 18:
		$_SESSION['titre'] = "Test - affichage correction";
		break;

		case 19:
		$_SESSION['titre'] = "Mon compte";
		break;

		default:
		$_SESSION['titre'] = "Accueil";
		break;

	}

	?>
