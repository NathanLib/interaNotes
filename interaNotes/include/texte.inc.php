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
			include_once('pages/enseignant_accueil.inc.php');
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
			include_once('pages/eleve_afficherSujet.inc.php');
			break;

			//
			// ...
			//
			case 9:
			// inclure ici ...
			include_once('pages/enseignant_creerClasse.inc.php');
			break;

			case 10:
			// inclure ici ...
			include_once('pages/enseignant_listerSujets.inc.php');
			break;


			case 11:
			// inclure ici la page de test de generation des sujets
			include_once('pages/test_generationSujets.inc.php');
			break;

		}

		?>
	</div>
