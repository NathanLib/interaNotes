<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
$eleveManager = new EleveManager($pdo);

if (isset($_SESSION['eleve'])){
   $personne = $personneManager->getPersonneByLogin($_SESSION['eleve']);
   $eleve = $eleveManager->getEleve($personne);

} elseif (isset($_SESSION['enseignant'])) {
  $personne = $personneManager->getPersonneByLogin($_SESSION['enseignant']);
}

?>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="row headDetailCompte">
            <div class="col-12 col-sm-4 col-lg-12 imgDetailsCompte">
                <div class="iconStudentDetailsCompte">
                    <img class="studentImg" src="image/student.png" alt="subject" title="subject">
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-12 nameDetailsCompte">
                <h3><?php echo $personne->getNomPersonne()." ".$personne->getPrenomPersonne(); ?></h3>
            </div>
        </div>
    </div>

    <hr class="hr-DetailsCompte d-lg-none">

    <div class="col-12 col-lg-6 bodyDetailCompte">
        <div class="row">

          <?php if(isset($_SESSION['eleve'])){ ?>
            <div class="col-12 partDetailCompte">
                <span class="titleDetailCompte">Nom de la promotion :</span>
                <span class="answerDetailCompte"><?php echo $eleve->getNomPromotion(); ?></span>
            </div>
            <div class="col-12 partDetailCompte">
                <span class="titleDetailCompte">Année :</span>
                <span class="answerDetailCompte"><?php echo $eleve->getAnneeInscription(); ?></span>
            </div>
          <?php } ?>

            <div class="col-12 partDetailCompte">
                <span class="titleDetailCompte">Mail :</span>
                <span class="answerDetailCompte"><?php echo $personne->getMailPersonne(); ?></span>
            </div>
            <div class="col-12 partDetailCompte">
                <span class="titleDetailCompte">Login :</span>
                <span class="answerDetailCompte"><?php echo $personne->getLoginPersonne(); ?></span>
            </div>
            <div class="col-12 partDetailCompte divBoutonChangerMdp">
                <input class="changeMdp" type="button" name="" value="Changer mon mot de passe">
            </div>
        </div>
    </div>
</div>
