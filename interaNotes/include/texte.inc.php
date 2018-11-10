<div id="texte">
	<?php
	if (!empty($_GET["page"])){
		$page=$_GET["page"];}
		else
		{$page=0;
		}
		switch ($page) {

			case 0:
			// inclure ici la page accueil
			include_once('pages/accueil.inc.php');
			break;

			//
			// ...
			//
			case 1:
			// inclure ici ...
			break;

			case 2:
			// inclure ici ...
			break;

			case 3:
			// inclure ici ...
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
			// inclure ici la page de déconnexion
			include_once('pages/Deconnexion.inc.php');
			break;

			default : include_once('pages/accueil.inc.php');
		}

		?>
	</div>
