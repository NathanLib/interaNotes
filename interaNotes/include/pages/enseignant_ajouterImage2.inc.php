<?php if(!isset($_POST["chemin"])) { ?>
  <form method="post" action="index.php?page=8">
    <input type="file" name="chemin" required>
    <input type="submit" value="Valider">
  </form>

<?php } else {
  $db = new Mypdo();
  $imageManager = new ImageManager($db);
  $importationReussie = $imageManager->ajouterImage($_POST["chemin"]);

  if($importationReussie){ ?>
    <p> Votre photo a été ajoutée sur Intera Notes ! </p>

  <?php
  }else{ ?>
    <p> Une erreur est subvenue lors de l'importation de l'image, veuillez réessayer ! </p>

  <?php
  }
  ?>


<?php } ?>
