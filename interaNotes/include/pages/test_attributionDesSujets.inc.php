<?php
//WARNING : vérifier si l'attribution n'a pas déjà été faite
//WARNING : nom de promo a recupérer depuis créer un idExamen
$nomPromo = "Promo 2021";
$idExamen = $_SESSION['examen']->getIdExamen();

$pdo = new Mypdo();
$eleveManager = new EleveManager($pdo);
$listeEleves = $eleveManager->getAllIdElevesByPromo($nomPromo);

$sujetManager = new SujetManager($pdo);
$listeSujets = $sujetManager->getAllSujetsOfExamen($idExamen);

$attributionManager = new AttributionManager($pdo);
?>

<div class="attributionSujets">
  <?php

  $retour = $attributionManager->insererTableauAttribution($listeEleves, $listeSujets);
  if($retour){
    echo "<p style='text-align:center;font-weight:bold; margin:10% 0;'><img class='icone' src='image/valid.png' alt='Validation attribution'> Les sujets ont été attribués";

  }else{
    echo "<p style='text-align:center;font-weight:bold; margin:10% 0;'><img class='icone' src='image/erreur.png' alt='Erreur attribution'>Erreur interne lors de l'attribution des sujets";
  }

   ?>
</div>
