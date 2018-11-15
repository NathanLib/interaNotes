<div id="texte">
	<?php
	if (!empty($_GET["page"])){
		$page=$_GET["page"];}
		else
		{$page=0;
		}
		switch ($page) {

			case 0:
			// inclure ici la page de connexion
			include_once('pages/connexion.inc.php');
			break;

			// inclure ici la page d'accueil de l'enseignant
			case 1:
			include_once('pages/accueilEnseignant.inc.php');
			break;

			// inclure ici la page d'accueil de l'élève
			case 2:
			include_once('pages/eleve_accueil.inc.php');
			break;

			case 3:
			include_once('pages/test_afficherUnSujetComplet.inc.php');
			break;

			case 4:
			// inclure ici ...
			break;

			//
			// ...
			//
			case 5:
			// inclure ici ...
			break;

			case 6:
			// inclure ici ...
			break;

			//
			// ...
			//
			case 7:
			// inclure ici ...
			break;

			case 8:
			// inclure ici ...
			break;

			//
			// ...
			//
			case 9:
			// inclure ici ...
			break;

			case 10:
			// inclure ici ...

			break;

			case 11:
			// inclure ici la page de connexion
			include_once('pages/Connexion.inc.php');
			break;

			case 12:
			// inclure ici la page de test de generation des sujets
			include_once('pages/test_generationSujets.inc.php');
			break;

			default : include_once('pages/accueil.inc.php');
		}

		?>
	</div>
