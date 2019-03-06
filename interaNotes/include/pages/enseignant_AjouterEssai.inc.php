<?php require_once("include/verifEnseignant.inc.php"); ?>

<?php
if(isset($_GET['id'])){

  $pdo = new Mypdo();
  $examenManager = new ExamenManager($pdo);

  $nbEssaiRestant = $examenManager->getNbEssaiRestant($_GET['id'],$_SESSION['examen']->getIdExamen());

  if(!isset($_POST['nbEssaiRealise'])) { ?>
    <form method="post" action="index.php?page=6?&id=1">

      <p>Choisir le nombre d'essai à ajouter pour l'étudiant : </p> <input type="number" name="nbEssaiRealise" min=<?php echo $nbEssaiRestant;?> step="1" value=<?php echo $nbEssaiRestant;?> >
      <input type="submit" value="Valider">
    </form>
  <?php } else {
      $examenManager->updateTries($_POST['nbEssaiRealise'],$_GET['id'],$_SESSION['examen']->getIdExamen())
      ?> <p> Le nombre d'essai de l'étudiant a été mis à jour !</p><?php

  }?>


<?php } else {
  header('Location: index.php?page=5');
}
