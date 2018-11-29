<?php
class GenerationManager{

  private $db;

  public function __construct($db){
		$this->db = $db;
	}

	public function genererExercice(){
    $valeurManager = new ValeurManager($this->db);

    $compteurSujet = 0;

    $listeValeurs_points_nbMoteurs = $valeurManager->getAllValeursOfPoints(1);
    $listeValeurs_points_vitesse = $valeurManager->getAllValeursOfPoints(2);
    $listeValeurs_points_nbPersonnes = $valeurManager->getAllValeursOfPoints(3);
    $listeValeurs_points_destinationPlanete = $valeurManager->getAllValeursOfPoints(4);
    $listeValeurs_points_distanceDestination = $valeurManager->getAllValeursOfPoints(5);
    $listeValeurs_points_consoCarbu = $valeurManager->getAllValeursOfPoints(6);
    $listeValeurs_points_consoEau = $valeurManager->getAllValeursOfPoints(7);
    $listeValeurs_points_consoNourritures = $valeurManager->getAllValeursOfPoints(8);
    $listeValeurs_points_consoO2 = $valeurManager->getAllValeursOfPoints(9);


    foreach ($listeValeurs_points_nbMoteurs as $nbMoteurs) {
      foreach ($listeValeurs_points_vitesse as $vitesse){
        foreach ($listeValeurs_points_nbPersonnes as $personnes){
          foreach ($listeValeurs_points_destinationPlanete as $planete){
            foreach ($listeValeurs_points_distanceDestination as $distance){
              foreach ($listeValeurs_points_consoCarbu as $consoCarbu){
                foreach ($listeValeurs_points_consoEau as $consoEau){
                  foreach ($listeValeurs_points_consoNourritures as $consoNourritures){
                    foreach ($listeValeurs_points_consoO2 as $consoO2){

                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $nbMoteurs->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $vitesse->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $personnes->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $planete->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $distance->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $consoCarbu->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $consoEau->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $consoNourritures->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($compteurSujet, $consoO2->getIdValeur());

                      $compteurSujet = $compteurSujet +1;
                    }
                  }
                }
              }
            }
          }
        }
      }
    }

    return $listeValeurs;
  }

}
