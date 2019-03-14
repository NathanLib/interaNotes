<?php
$pdo = new Mypdo();
?>

<div class="generationSujets">

  <div class="genererSujet">
    <?php

    $sujetManager = new SujetManager($pdo);
    $idPremierSujet = $sujetManager->getIdSujetPossible();

    $examenManager = new ExamenManager($pdo);
    $examen = $examenManager->getExamen(1);

    $generationManager = new GenerationManager($pdo);
    $listeExercicesGeneres = $generationManager->genererExercice($examen, $idPremierSujet);

    echo "<pre>";
    var_dump(count($listeExercicesGeneres));
    echo "</pre>";


    //Exportation dans la base de données
    /*$enonceManager = new EnonceManager($pdo);
    $resultatTabEnonces = $enonceManager->insererTableauEnonces($listeExerciceGenere['enonces']);

    $sujetManager = new SujetManager($pdo);
    $resultatTabSujets = $sujetManager->insererTableauSujets($listeExerciceGenere['sujets']);

    $exerciceGenereManager = new ExerciceGenereManager($pdo);
    $resultatTabExercices = $exerciceGenereManager->insererTableauExercices($listeExerciceGenere['exerciceGenere']);

    $retour = $resultatTabEnonces*$resultatTabSujets*$resultatTabExercices;*/
    /*echo "<pre>";var_dump($listeExerciceGenere['exerciceGenere']);echo "</pre>";*/
    $retour = false;

    if($retour){
      $nbSujets = count($listeExerciceGenere['sujets']);
      echo "<p style='text-align:center;font-weight:bold; margin:10% 0;'><img class='icone' src='image/valid.png' alt='Validation génération'> ".$nbSujets." sujets ont été générés";

    }else{
      echo "<p style='text-align:center;font-weight:bold; margin:10% 0;'><img class='icone' src='image/erreur.png' alt='Erreur génération'>Erreur interne lors de la génération";
    }

     ?>
  </div>
</div>
