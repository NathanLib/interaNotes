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
    $pointManager = new PointManager($pdo);
    $listePoints = $pointManager->getAllPointsOfExamens(1);

    $valeurManager = new ValeurManager($pdo);

    foreach($listePoints as $point) {
      $listeValeurs = $valeurManager->getAllValeursOfPoints($point);

      foreach ($listeValeurs as $valeur) {
        $listeSujets[] = array('idValeur' => $valeur->getIdValeur(), 'idPoint' => $point->getIdPoint());
        $tab[] = "IDvaleur : ".$valeur->getIdValeur()." pour IDpoint : ".$point->getIdPoint();
      }
    }

    $retour = false;

    echo "<pre>";
    print_r($listeSujets);
    echo "</pre>";

    if($retour){
      echo "<p><img class='icone' src='image/valid.png' alt='Validation génération'>Génération complète";

    }else{
      echo "<p><img class='icone' src='image/erreur.png' alt='Erreur génération'>Erreur lors de la génération";
    }

     ?>
  </div>
</div>
