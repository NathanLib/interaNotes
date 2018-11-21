<?php
$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);

$listeSujets = $sujetManager->getAllSujetsOfExamen($_SESSION['examen']->getIdExamen());
?>

<div class="listerSujet">
    <?php // WARNING: BLOC A LAISSER ?>
    <div class="row justify-content-around text-center teteListeSujet">
        <div class="col-6 col-sm-3 col-lg-2 textListeSujet">
            <p> </p>
        </div>
        <div class="col-6 col-lg-4">
            <span id="attributeTo">Attribué à : </span>
        </div>
        <div class="col-3 col-lg-2">
        </div>
    </div>

    <?php // WARNING: BLOC A GENERER EN PHP
    foreach ($listeSujets as $sujet) { ?>
      <div class="row justify-content-center text-center contenuListeSujet">
          <div class="col-6 col-sm-3 col-lg-2 textListeSujet">
              <p>Sujet n°<?php echo $sujet->getIdSujet() ?></p>
          </div>

          <div class="col-6 col-lg-4 textListeSujet">
              <p>Ginny POTTER</p>
          </div>

          <div class="col-6 col-sm-3 col-lg-2 buttonConsulter">
            <a href="index.php?page=3&amp;id=<?php echo $sujet->getIdSujet();?>"><input type="button" name="" value="Consulter"></a>          
          </div>
      </div>
    <?php
    } ?>

</div>
