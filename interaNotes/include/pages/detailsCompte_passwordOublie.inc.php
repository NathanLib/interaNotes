<?php
if(empty($_POST['mail'])){ ?>

  <h1>Mot de passe oublié ?</h1>

  <form method="post" action="#">

    <label for="mail">Veuillez saisir votre mail : </label>
      <input type="email" id="mail" name="mail" required/>
    </br>

    <input type="submit" value="Valider" class="btn">

  </form>

<?php
}else{
  $pdo = new Mypdo();
  $personneManager = new PersonneManager($pdo);

  $personne = $personneManager->getPersonneByMail($_POST['mail']);

  if($personne){

    $password = createRandomPassword();
    $personneManager->updatePasswordOfPersonne($personne->getIdPersonne(),createProtectedPassword($password));

    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['passwd'] = $password;

    header('Location: index.php?page=44');?>

  <?php
  }else{ ?>

    <div>
      <h1>Compte inexistant</h1>
      <p>L'adresse mail insérée ne correspond à aucun compte, veuillez vérifier votre adresse mail et essayer à nouveau</p>
    </div>

  <?php
  }
}?>
