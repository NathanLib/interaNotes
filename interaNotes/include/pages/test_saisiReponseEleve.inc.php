<?php require_once("include/verifEleve.inc.php"); 

$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);
$questionManager = new QuestionManager($pdo);


$idSujet = $sujetManager->getIdSujetByLogin($_SESSION['eleve']);
$sujet = $sujetManager->getSujet($idSujet);
$enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());

if (empty($_POST['reponse1'])) {

    ?>

    <div class="row answerSubject">
        <form action="index.php?page=15" method="post">
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
               <?php $listeQuestion = $questionManager->getAllQuestion($idSujet); 
               foreach ($listeQuestion as $attribut => $value) { ?>
                <div class="row">
                    <div class="col-10">
                        <span>Question <?php echo $value->getIdReponse() ?> :</span>
                        <p><?php echo $value->getIntituleQuestion() ;?></p><p> <?php echo " /".$value->getBareme()."pts" ?></p>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-7 form-group">
                                <label for="detailAnswer">Détail calcul :</label>
                                <textarea class="form-control" id="detailAnswer" name="justification<?php  echo $value->getIdReponse() ?>" onkeyup="adjustHeightTextAreaLittle(this)" name="" placeholder='Veuillez écire ici les différentes étapes de calculs qui vous ont permis de trouver le résultat ...' required></textarea>
                            </div>

                            <div class="col-12 col-lg-5 form-group">
                                <label for="resultAnswer">Résultat :</label>
                                <input class="form-control" id="resultAnswer" name="reponse<?php echo $value->getIdReponse() ?>" type="text" placeholder="" required>
                            </div>

                            <div class="col-12 col-lg-5 form-group">
                                <label for="resultAnswer">Unité du Résultat :</label>
                                <input class="form-control" id="resultAnswer" name="unite<?php echo $value->getIdReponse() ?>" type="text" placeholder="" required>
                            </div>

                            <div class="col-12 col-lg-5 form-group">
                                <label for="resultAnswer">Exposant du Résultat :</label>
                                <input class="form-control" id="resultAnswer" name="unite<?php echo $value->getIdReponse() ?>" type="text" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>
            <?php   } ?>
            <input type="submit" value="Envoyer">
        </form>
    </div>

</div>

<?php } else {

$i=1;
foreach ($_POST as $attribut => $value) {
    switch ($i) {
        case 1:$question['justification']=$value[0];
            $i++;
            break;
        case 2:$question['reponse']=$value[0];
            $i++;
            break;
        case 3:$question['unite']=$value[0];
            $i++;
            break;
        case 4:$question['exposant']=$value[0];
            $i=1;
            $listeReponse[]=$question;
            break;
        default:
            exit();
            break;
    } 
}

var_dump($listeReponse);

} ?>
