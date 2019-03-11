<?php if(!isset($_POST["chemin"]) && !isset($_POST["supprimer"])) {
  $db = new Mypdo();
  $imageManager = new ImageManager($db);

  ?>
  <form method="post" action="index.php?page=8">
    <div>
    <label> Ajouter une photo </label>
    <input type="file" name="chemin" id="chemin" onchange="desactiverFormulaire()" required>
  </div>

    <div>
      <label> Supprimer </label>
    <select class="form-control" name="supprimer" id="supprimer" onchange="desactiverFormulaire()" required>
      <option hidden selected></option>
      <?php $listeImages = $imageManager->getAllImages();
      foreach ($listeImages as $key => $value) { ?>
        <option value="<?php echo $value->getIdImage();?>" > <?php echo $value->getCheminImage(); ?> </option>
    <?php  } ?>
    </select>
    <p> Attention : irréversible ! </p>
  </div>
    <input type="submit" value="Valider">
  </form>

<?php } else {
  $db = new Mypdo();
  $imageManager = new ImageManager($db);

  if(isset($_POST["chemin"])) {
    $imageManager->ajouterImage($_POST["chemin"]); ?>
    <p> Votre photo a été ajoutée sur Intera Notes ! </p>
<?php  } else {
    $imageManager->supprimerImage($_POST["supprimer"]); ?>
    <p> Votre photo a été supprimée de Intera Notes ! </p>
<?php  }
 } ?>
