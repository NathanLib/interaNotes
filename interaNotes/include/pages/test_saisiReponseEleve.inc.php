<?php require_once("include/verifEleve.inc.php"); 

$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);
$questionManager = new QuestionManager($pdo);


$idSujet = $sujetManager->getIdSujetByLogin($_SESSION['eleve']);
$sujet = $sujetManager->getSujet($idSujet);
$enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());

?>

<div class="row answerSubject">
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 form-group">
                <span>Titre de l'énoncé : </span>
                <?php echo $enonceSujet->getTitreEnonce(); ?> 
            </div>
            <div class="col-12 col-sm-6 col-md-4 form-group">
                <span>Date de fin : </span>
                <?php echo $examenManager->getDateLimitebySujet($idSujet); ?>
            </div>
        </div>
    </div>
    <div class="col-12">
     <?php $listeQustion = $questionManager->getAllQuestion($idSujet); 
     foreach ($listeQustion as $attribut => $value) { ?>
        <div class="row">
            <div class="col-10">
                <span>Question <?php echo $value->getIdReponse() ?> :</span>
                <p><?php echo $value->getIntituleQuestion() ?></p>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-7 form-group">
                        <label for="detailAnswer">Détail calcul :</label>
                        <textarea class="form-control" id="detailAnswer"  onkeyup="adjustHeightTextAreaLittle(this)" name="" placeholder='Veuillez écire ici les différentes étapes de calculs qui vous ont permis de trouver le résultat ...'></textarea>
                    </div>

                    <div class="col-12 col-lg-5 form-group">
                        <label for="resultAnswer">Résultat :</label>
                        <input class="form-control" id="resultAnswer" type="text" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <?php   } ?>

    </div>

</div>
