<?php
if (isset($_SESSION['eleve']) || isset($_SESSION['enseignant'])){

  if(empty($_POST['new_password'])){

    if(!empty($_SESSION['errMsg'])) {
      echo "<p><img class='icone' src='image/erreur.png'>".$_SESSION['errMsg'];
      unset($_SESSION['errMsg']);
    } ?>

    <form method="post" action="#">

      <label for="old_password">Ancien mot de passe : </label>
        <input type="password" id="old_password" name="old_password" required/>
      </br>

      <label for="new_password">Nouveau mot de passe : </label>
        <input type="password" id="new_password" name="new_password" required/>
      </br>

      <label for="conf_password">Confirmer nouveau mot de passe : </label>
        <input type="password" id="conf_password" name="conf_password" required/>
      </br>

      <input type="submit" value="Valider" class="btn">

    </form>

  <?php
  }else{

    if (isset($_SESSION['eleve'])){
      $login = $_SESSION['eleve'];
    }else{
      $login = $_SESSION['enseignant'];
    }

    if($_POST['new_password'] === $_POST['conf_password']){

      $pdo = new Mypdo();
      $personneManager = new PersonneManager($pdo);
      $infosConnexion = $personneManager->verifierInfosConnexion($login, createProtectedPassword($_POST['old_password']));

      if($infosConnexion === "enseignant" || $infosConnexion === "eleve"){
        $personne = $personneManager->getPersonneByLogin($login);

        $retour = $personneManager->updatePasswordOfPersonne($personne->getIdPersonne(), createProtectedPassword($_POST['new_password']));

        if($retour){?>
          <p><img class='icone' src='image/valid.png' alt='Validation mise à jour mot de passe'> Votre mot de passe a bien été modifié</p>

        <?php
        }else{
          $_SESSION['errMsg'] = "Erreur interne : votre mot de passe n'a pu être modifié";
          header('Location: index.php?page=42');
        }

      }else{
        $_SESSION['errMsg'] = "L'ancien mot de passe renseigné est incorrecte";
        header('Location: index.php?page=42');
      }

    }else{
      $_SESSION['errMsg'] = "La confirmation du mot de passe est invalide, les 2 mots de passe doivent être identique";
      header('Location: index.php?page=42');
    }
  }
}else{
  header('Location: index.php?page=0');
}
