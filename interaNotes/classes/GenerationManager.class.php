<?php
class GenerationManager{

  private $db;

  public function __construct($db){
		$this->db = $db;
	}

	public function genererExercice($listeDependances, $idSujet){
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

                      $listeValeurs[] = new ExerciceGenere($idSujet, $nbMoteurs->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $vitesse);
                      $listeValeurs[] = new ExerciceGenere($idSujet, $personnes->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $planete->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $distance);
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoCarbu->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoEau->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoNourritures->getIdValeur());
                      $listeValeurs[] = new ExerciceGenere($idSujet, $consoO2->getIdValeur());

                      //avec params accessible
                      $listeEnonces[] = new Enonce(array('idEnonce'=>$idSujet,'titre'=>"Simulation d'une fusée",'consigne'=>"consigne du sujet n°".$idSujet));

                      //WARNING : comment savoir le bon numéro d'énoncé dans la base ?
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
