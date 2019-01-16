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

                      $enonceSujet = "Selon les paramètres suivants, indiquez le nombre de jours ainsi que les quantités nécessaires d'O2, de carburant, de nourriture et d'eau pour atteindre Lune :
                      <ul>
                        <li>nombre de moteurs : ".$nbMoteurs->getValeur()."</li>
                        <li>vitesse : ".$valeurVitesse." km/h</li>
                        <li>Consommation de carburant par moteur : ".$consoCarbu->getValeur()." tonnes/1000km</li>
                        <li>Consommation d'eau par jour par personne : ".$consoEau->getValeur()."L</li>
                        <li>Consommation de nourriture par personne par journée : ".$consoNourritures->getValeur()." Kg</li>
                        <li>Consommation d'O² par personne par jour : ".$consoO2->getValeur()."L</li>
                        <li>Le nombre de personnes dans l'équipage : ".$personnes->getValeur()."</li>
                        <li>Destination : ".$planete->getValeur()."</li>
                        <li>Distance Terre/Lune : ".$valeurDistance." km</li>
                      </ul>";

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
