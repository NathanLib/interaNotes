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
    $dependanceManager = new DependanceManager($pdo);
    $listeDependances = $dependanceManager->getAllDependances();

    $sujetManager = new SujetManager($pdo);
    $idPremierSujet = $sujetManager->getIdSujetPossible();

    $generationManager = new GenerationManager($pdo);
    $listeExerciceGenere = $generationManager->genererExercice($listeDependances, $idPremierSujet);

    //1ere Méthode : sans opti
    /*$enonceManager = new EnonceManager($pdo);
    $enonceManager->insererTableauEnonces($listeExerciceGenere['enonces']);

    $sujetManager = new SujetManager($pdo);
    $sujetManager->insererTableauSujets($listeExerciceGenere['sujets']);

    $exerciceGenereManager = new ExerciceGenereManager($pdo);
    $exerciceGenereManager->insererTableauExercices($listeExerciceGenere['exerciceGenere']);*/

    //2ème méthode : avec optimisation
    /*$enonceManager = new EnonceManager($pdo);
    $enonceManager->insererTableauEnonces2($listeExerciceGenere['enonces']);

    $sujetManager = new SujetManager($pdo);
    $sujetManager->insererTableauSujets2($listeExerciceGenere['sujets']);

    $exerciceGenereManager = new ExerciceGenereManager($pdo);
    $exerciceGenereManager->insererTableauExercices2($listeExerciceGenere['exerciceGenere']);*/

    echo "<pre>";
    var_dump($listeExerciceGenere['enonces']);
    echo "</pre>";

    echo "nbSujets Générés : ".count($listeExerciceGenere['sujets']);
    echo "nbexericieGénérés : ".count($listeExerciceGenere['exerciceGenere']);

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
