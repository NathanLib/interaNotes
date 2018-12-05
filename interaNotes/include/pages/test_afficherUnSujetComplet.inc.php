<?php
if(isset($_GET['id'])){ //WARNING gérer quand l'id n'existe pas dans la base

  $idSujet = $_GET['id'];

  $pdo = new Mypdo();
  $sujetManager = new SujetManager($pdo);
  $enonceManager = new EnonceManager($pdo);

  $valeurManager = new ValeurManager($pdo);
  $pointManager = new PointManager($pdo);

  $sujet = $sujetManager->getSujet($idSujet);
  $enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());
  ?>

  <div id="sujet">
    <p>Titre : <?php echo $enonceSujet->getTitreEnonce(); ?> </p>
    <p>Date de fin : <?php echo $_SESSION['examen']->getDateDepotExamen(); ?> </p>
    <p>Consignes : <?php echo $enonceSujet->getConsigneEnonce(); ?> </p>
    <p>Valeurs du sujets : </p>

  	<?php
  	$valeurs = $valeurManager->getValeursSujet($idSujet);

  	foreach ($valeurs as $valeur) {
  		$point = $pointManager->getPoint($valeur->getIdPointOfValeur());?>

  		<p><?php echo $point->getNomPoint()." = ".$valeur->getValeur()." ".$point->getUnitePoint(); ?></p>
  	<?php } ?>

    <a href="index.php?page=13&amp;id=<?php echo $sujet->getIdSujet();?>"><input type=button value="Correction"></input></a>
  </div>

<?php
}else{
  header('Location: index.php?page=3');
} ?>
