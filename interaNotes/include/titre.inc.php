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
		case 10:
		$_SESSION['titre'] = "Accueil";
		break;

		case 11:
		$_SESSION['titre'] = "Mon sujet";
		break;

		// WARNING: PARTIE TEST

		case 20:
		$_SESSION['titre'] = "Test - sujet complet";
		break;

		case 21:
		$_SESSION['titre'] = "Test - sujet corrigé";
		break;

		case 22:
		$_SESSION['titre'] = "Test - génération sujets";
		break;

		case 23:
		$_SESSION['titre'] = "Test - saisie élève";
		break;

		case 24:
		$_SESSION['titre'] = "Test - Publipostage";
		break;

		case 25:
		$_SESSION['titre'] = "Test - affichage correction";
		break;

		case 26:
		$_SESSION['titre'] = "Test - affichage Pop up";
		break;

		// WARNING : Pages communes

		case 40:
		$_SESSION['titre'] = "Déconnexion";
		break;

		case 41:
		$_SESSION['titre'] = "Mon compte";
		break;

		case 42:
		$_SESSION['titre'] = "Mon compte - Mot de passe";
		break;

		case 43:
		$_SESSION['titre'] = "Mot de passe oublié";
		break;

		case 44:
		$_SESSION['titre'] = "Mot de passe oublié";
		break;
	}

	?>
