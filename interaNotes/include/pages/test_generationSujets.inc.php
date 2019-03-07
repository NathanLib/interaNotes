<?php
require_once("include/verifEnseignant.inc.php");

$pdo = new Mypdo();
?>

<div class="generationSujets">

  <div class="genererSujet">
    <?php

    $dependanceManager = new DependanceManager($pdo);
    $listeDependances = $dependanceManager->getAllDependances();

    $sujetManager = new SujetManager($pdo);
    $idPremierSujet = $sujetManager->getIdSujetPossible();

    $generationManager = new GenerationManager($pdo);
    $listeExerciceGenere = $generationManager->genererExerciceFusee($listeDependances, $idPremierSujet);

    //Exportation dans la base de données
    $enonceManager = new EnonceManager($pdo);
    $resultatTabEnonces = $enonceManager->insererTableauEnonces($listeExerciceGenere['enonces']);

    $sujetManager = new SujetManager($pdo);
    $resultatTabSujets = $sujetManager->insererTableauSujets($listeExerciceGenere['sujets']);

    $exerciceGenereManager = new ExerciceGenereManager($pdo);
    $resultatTabExercices = $exerciceGenereManager->insererTableauExercices($listeExerciceGenere['exerciceGenere']);

    $retour = $resultatTabEnonces*$resultatTabSujets*$resultatTabExercices;

    if($retour){
      $nbSujets = count($listeExerciceGenere['sujets']);

      ?>
      <div class="msgConfirmTitre">
          <h3>Message de confirmation</h3>
          <p><?php echo $nbSujets; ?> sujets ont été générés ! </p>
      </div>
      <?php
    }else{
        ?>
        <div class="msgErrorTitre">
            <h3>Erreur interne</h3>
            <p>Aucun sujet n'a pu être généré ! </p>
        </div>
        <?php
    }

     ?>
  </div>
</div>
