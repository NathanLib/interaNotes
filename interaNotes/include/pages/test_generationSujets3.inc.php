<?php
$pdo = new Mypdo();
?>

<div class="generationSujets">

  <div class="genererSujet">
    <?php

    $sujetManager = new SujetManager($pdo);
    $idPremierSujet = $sujetManager->getIdSujetPossible();

    $generationManager = new GenerationManager3($pdo);
    $listeExercicesGeneres = $generationManager->genererExercice(1, $idPremierSujet);

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
