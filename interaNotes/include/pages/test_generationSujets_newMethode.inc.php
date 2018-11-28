<?php
$pdo = new Mypdo();
$examenManager = new ExamenManager($pdo);
$listeExamens = $examenManager->getAllExamens(); ?>

<div class="generationSujets">

  <div class="listerExamens">
    <table>

      <tr>
        <th>IdExamen</th>
        <th>DateDepot</th>
        <th>AnneeScolaire</th>
      <tr>

    <?php foreach($listeExamens as $examen) { ?>
      <tr>
        <td><?php echo $examen->getIdExamen()?></td>
        <td><?php echo $examen->getDateDepotExamen()?></td>
        <td><?php echo $examen->getAnneeScolaireExamen()?></td>
      </tr>
    <?php } ?>

    </table>

  </div>

  <div class="genererSujet">
    <?php
    /*-------------DEBUT-------------------------------*/
    $pointManager = new PointManager($pdo);
    $listePoints = $pointManager->getAllPointsOfExamens(1);

    $valeurManager = new ValeurManager($pdo);

    $compteurSujet = 0;

    for($i=0; $i<count($listePoints); $i++){
      $listeValeur[$i] = $valeurManager->getAllValeursOfPoints($listePoints[$i]->getIdPoint());
    }

    echo "<pre>";
    var_dump($listeValeur);
    echo "</pre>";
    //tableau avec param 'nbMoteur' etc...
    for($i=0; $i<count($listeValeur); $i++){ //parcours des points
      for($j=0; $j<count($listeValeur[$i]); $j++){ //parcours des valeurs de point
        echo "<p>Sujet n°".$compteurSujet;
        echo "</br>test : ".$listeValeur[$i][$j]->getValeur();

        echo "</p></br>";

        $compteurSujet = $compteurSujet +1;
      }

    }

    /*$listeValeurs_points_nbMoteurs = $valeurManager->getAllValeursOfPoints(1);
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
                      echo "<p>Sujet n°".$compteurSujet;
                      echo "</br>Points nb moteurs : ".$nbMoteurs->getValeur();
                      echo "</br>Points vitesse : ".$vitesse->getValeur();
                      echo "</br>Points nb personnes : ".$personnes->getValeur();
                      echo "</br>Points planete : ".$planete->getValeur();
                      echo "</br>Points distance : ".$distance->getValeur();
                      echo "</br>Points consoCarbu : ".$consoCarbu->getValeur();
                      echo "</br>Points consoEau : ".$consoEau->getValeur();
                      echo "</br>Points consoNourritures : ".$consoNourritures->getValeur();
                      echo "</br>Points consoO2 : ".$consoO2->getValeur();
                      echo "</p></br>";

                      $compteurSujet = $compteurSujet +1;
                    }
                  }
                }
              }
            }
          }
        }
      }
    }*/

    /*--------------------------FIN-------------------------------*/
    $retour = false;

    if($retour){
      echo "<p><img class='icone' src='image/valid.png' alt='Validation génération'>Génération complète";

    }else{
      echo "<p><img class='icone' src='image/erreur.png' alt='Erreur génération'>Erreur lors de la génération";
    }

     ?>
  </div>
</div>
