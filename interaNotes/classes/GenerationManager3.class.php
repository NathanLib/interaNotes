<?php
class GenerationManager3{

  private $db;

  private $constructionSujet;
  private $idSujet;

  private $listeExercicesGeneres;

  public function __construct($db){
		$this->db = $db;
	}

  //WARNING : faire var pour nbPoints
  public function genererExercice($idExamen, $idSujetDepart){
    $pointManager = new PointManager($this->db);
    $valeurManager = new ValeurManager($this->db);

    $listeDesPoints = $pointManager->getAllPointsOfExamens($idExamen);
    $this->idSujet = $idSujetDepart;

    foreach ($listeDesPoints as $index => $point) {
      $listeValeursDesPoints[$index] = $valeurManager->getAllValeursOfPoints($listeDesPoints[$index]->getIdPoint());
    }

    $listeValeursTemporaires = array();
    $this->genererSujetAvecNouveauParametre(count($listeDesPoints) -1, 0, $listeValeursDesPoints, $listeValeursTemporaires);

    $this->extractionDesDonnees(count($listeDesPoints));
    return $this->constructionSujet;
  }

  /*Fonction permettant d'attribuer à chaque point des sujets une valeurs
  * Précondition : Une variable globale doit être définie : $listeValeursTemporaires
  *       Elle va permettre de stocker les informations nécessaires entre les différents appels récursifs
  */
  private function genererSujetAvecNouveauParametre($nbEtapesTotale, $etapeActuelle, $listeDesPoints, $listeValeursTemporaires){
    if($nbEtapesTotale === $etapeActuelle){

      foreach ($listeDesPoints[$etapeActuelle] as $point) {
        $listeValeursTemporaires[$etapeActuelle] = $point;

        foreach ($listeValeursTemporaires as $valeurPoint) {
          $this->constructionSujet[$this->idSujet][$valeurPoint->getIdPointOfValeur()] = $valeurPoint;
        }

        $this->idSujet++;
      }

    } else {
      foreach ($listeDesPoints[$etapeActuelle] as $point) {
        $listeValeursTemporaires[$etapeActuelle] = $point;
        $this->genererSujetAvecNouveauParametre($nbEtapesTotale, $etapeActuelle +1, $listeDesPoints, $listeValeursTemporaires);
      }
    }
  }

  private function extractionDesDonnees($nombrePoints){


    $nbSujets = count($this->constructionSujet);
    foreach ($this->constructionSujet as $idSujet => $point) {
      foreach($point as $valeur){
        $this->listeExercicesGeneres[] = new ExerciceGenere($idSujet, $valeur->getIdValeur());
      }
    }

    echo "<pre>";
    var_dump($this->listeExercicesGeneres);
    echo "</pre>";
  }

}
