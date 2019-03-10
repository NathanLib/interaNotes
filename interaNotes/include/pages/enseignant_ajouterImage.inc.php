<?php if(!isset($_POST["cheminImage"])) { ?>
  <div class="importerUneImage">
      <h3>Importer une image :</h3>
      <form method="post" action="index.php?page=8">
        <div>
            <input type="file" name="cheminImage" id="file-3" class="inputfile inputfile-3" required/>
            <label for="file-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                </svg>
                <span>Choisissez un fichier&hellip;</span>
            </label>
        </div>

        <input type="submit" value="Valider">
      </form>
  </div>

<?php } else {
  $db = new Mypdo();
  $imageManager = new ImageManager($db);
  $importationReussie = $imageManager->ajouterImage($_POST["cheminImage"]);

  if($importationReussie){ ?>
      <div class="msgConfirmTitre">
          <h3>Message de confirmation</h3>
          <p>Votre photo a été ajoutée sur Intera Notes !</p>
      </div>

  <?php
  }else{ ?>
      <div class="msgErrorTitre">
          <h3>Erreur importation</h3>
          <p>Une erreur est subvenue lors de l'importation de l'image, veuillez réessayer !</p>
      </div>

  <?php
  }
  ?>

<?php } ?>
