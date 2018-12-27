<?php require_once("include/verifEleve.inc.php");

$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);

$valeurManager = new ValeurManager($pdo);
$pointManager = new PointManager($pdo);


$idSujet = $sujetManager->getIdSujetByLogin($_SESSION['eleve']);
if (!$idSujet){
    ?>
    <p style="text-align:center;font-weight:bold; margin:10% 0;">
        <img src="image/erreur.png" alt="Erreur" title="erreur">Aucun sujet attribué actuellement !
    </p>
    <?php
} else {

    $sujet = $sujetManager->getSujet($idSujet);
    $enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());

    $valeurs = $valeurManager->getValeursSujet($idSujet);

    ?>



    <div class="row mySubject">
        <div class="row">
            <div class="col-12">
                <p>
                    <span>Titre de l'énoncé : </span>
                    <?php echo $enonceSujet->getTitreEnonce(); ?>
                </p>
            </div>
            <div class="col-12">
                <p>
                    <span>Date de fin : </span>
                    <?php echo getFrenchDate($examenManager->getDateLimitebySujet($idSujet)); ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div>
                    <span id="subjectTitle">Enoncé :</span>
                    <br>
                    <p class="textSubject">
                        <?php echo $enonceSujet->getConsigneEnonce(); ?>
                    </p>
                </div>
                <div>
                    <span id="subjectTitle">Consigne :</span>
                    <br>
                    <p class="textSubject">
                        Selon les paramètres énoncés précédemment, veuillez indiquer les quantités nécessaires d'O², de carburant, de nourriture et d'eau pour que la fusée Ariane 5 atteigne sa destination.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <span id="subjectTitle">Images :</span>
                <br>

                <div class="row justify-content-around">
                    <img class="col-12 col-sm-6 col-md-4 col-lg-2 rounded subjectPictureOne" src="image/sujet/FuséeMoteur<?php echo $valeurs[0]->getValeur() ?>.jpg">

                    <img class="col-12 col-sm-6 col-md-4 col-lg-2 rounded subjectPictureTwo" src="image/sujet/Astronaute<?php echo $valeurs[2]->getValeur() ?>.jpg">
                </div>

            </div>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="boutonSaisieReponse">
                <a href="index.php?page=23">Saisir les réponses</a>
            </div>
        </div>
    </div>
</div>


<?php } ?>
