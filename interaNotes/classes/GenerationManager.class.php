<?php
class GenerationManager{

  private $db;

  public function __construct($db){
		$this->db = $db;
	}

	public function genererExerciceFusee($listeDependances, $idSujet){
    $valeurManager = new ValeurManager($this->db);

    $listeValeurs_points_nbMoteurs = $valeurManager->getAllValeursOfPoints(1);
    $listeValeurs_points_nbPersonnes = $valeurManager->getAllValeursOfPoints(3);
    $listeValeurs_points_destinationPlanete = $valeurManager->getAllValeursOfPoints(4);
    $listeValeurs_points_consoCarbu = $valeurManager->getAllValeursOfPoints(6);
    $listeValeurs_points_consoEau = $valeurManager->getAllValeursOfPoints(7);
    $listeValeurs_points_consoNourritures = $valeurManager->getAllValeursOfPoints(8);
    $listeValeurs_points_consoO2 = $valeurManager->getAllValeursOfPoints(9);

    foreach ($listeValeurs_points_nbMoteurs as $nbMoteurs) {
      foreach ($listeValeurs_points_nbPersonnes as $personnes){
        foreach ($listeValeurs_points_destinationPlanete as $planete){
          foreach ($listeValeurs_points_consoCarbu as $consoCarbu){
            foreach ($listeValeurs_points_consoEau as $consoEau){
              foreach ($listeValeurs_points_consoNourritures as $consoNourritures){
                foreach ($listeValeurs_points_consoO2 as $consoO2){

                  //Les dépendances possibles
                  $listeValeurs_points_vitesse = array_keys($listeDependances,$nbMoteurs->getIdValeur());
                  $listeValeurs_points_distanceDestination = array_keys($listeDependances,$planete->getIdValeur());

                  foreach ($listeValeurs_points_vitesse as $vitesse) {
                    foreach ($listeValeurs_points_distanceDestination as $distance) {

                      //Partie création énoncé
                      $valeurVitesse = $valeurManager->getValeur($vitesse);
                      $valeurDistance = $valeurManager->getValeur($distance);

                      $enonceSujet ="En 2016, la fusée Ariane 5 a décollé du Centre Spatial Guyanais en direction de ".$planete->getValeur()."qui se situe à ".$valeurDistance." Kms de notre chère Terre !<br><br>Nous savons que la fusée possède ".$nbMoteurs->getValeur()." moteur(s), la fusée peut aller à une vitesse de ".$valeurVitesse." Km/H et chaque moteur a une consommation de carburant qui vaut ".$consoCarbu->getValeur()." Tonnes/1000 Kms !<br><br>A bord de cette fusée, l'équipage est constitué de ".$personnes->getValeur()." personnes et chaque personne consomme ".$consoNourritures->getValeur()." Kgs de nourriture, ".$consoEau->getValeur()." L d'eau et ".$consoO2->getValeur()." L d'O² par jour.";

                      //Partie exportation des données
                      $listeValeurs[] = new ExerciceGenere($idSujet, $nbMoteurs->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $vitesse);
                      $listeValeurs[] = new ExerciceGenere($idSujet, $personnes->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $planete->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $distance);
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoCarbu->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoEau->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoNourritures->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoO2->getIdValeur());

                      $listeEnonces[] = new Enonce(array('idEnonce'=>$idSujet,'titre'=>"Simulation d'une fusée",'consigne'=>$enonceSujet));

                      $listeSujets[] = new Sujet(array('idSujet'=>$idSujet,'idEnonce'=>$idSujet,'semestre'=>1, 'idExamen'=>1));

                      $idSujet++;
                    }


                  }

                }
              }
            }
          }
        }
      }
    }

    $tableauSujets['enonces'] = $listeEnonces;
    $tableauSujets['sujets'] = $listeSujets;
    $tableauSujets['exerciceGenere'] = $listeValeurs;
    return $tableauSujets;
  }

}
