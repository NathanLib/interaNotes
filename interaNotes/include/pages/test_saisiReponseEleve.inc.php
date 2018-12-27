<?php require_once("include/verifEleve.inc.php");

$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);
$questionManager = new QuestionManager($pdo);
$eleveManager = new EleveManager($pdo);
$reponseEleveManager = new ReponseEleveManager($pdo);

$idSujet = $sujetManager->getIdSujetByLogin($_SESSION['eleve']); // WARNING
$sujet = $sujetManager->getSujet($idSujet);
$enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());
if(!$idSujet){
    ?>
    <p style="text-align:center;font-weight:bold; margin:10% 0;">
        <img src="image/erreur.png" alt="erreur">
        Aucun sujet attribué !
    </p>
    <?php
} else {
    $dateLimite=$examenManager->getDateLimitebySujet($idSujet);

    if($examenManager->dateLimiteEstDepassee($dateLimite)) { ?>

        <p style="text-align:center;font-weight:bold; margin:10% 0;">
            <img src="image/erreur.png" alt="erreur">
            La date limite pour envoyer les réponses est dépassée !
        </p>

    <?php } else {

        if (empty($_POST['reponse1'])) { ?>

            <div class="row answerSubject">
                <form action="index.php?page=23" method="post" style="width:100%">
                    <div class="col-12">
                        <div class="row justify-content-around">
                            <div class="col-12 col-sm-6 col-md-5 form-group headerSaisie">
                                <span>Titre de l'énoncé : </span>
                                <?php echo $enonceSujet->getTitreEnonce(); ?>
                            </div>
                            <div class="col-12 col-sm-6 col-md-5 form-group headerSaisie">
                                <span>Date de fin : </span>
                                <?php echo getFrenchDate($dateLimite); ?>
                            </div>
                        </div>
                    </div>

                    <hr class="hr" style="width:80%">

                    <div class="col-12">
                        <?php $listeQuestions = $questionManager->getAllQuestion($idSujet);
                        foreach ($listeQuestions as $question) { ?>
                            <div class="row">
                                <div class="col-9">
                                    <span>Question <?php echo $question->getIdReponse() ?> :</span>
                                </div>
                                <div class="col-3">
                                    <p style="align-self:end; margin:0"><?php echo " /".$question->getBareme()."pts" ?></p>
                                </div>
                                <div class="col-12">
                                    <p><?php echo $question->getIntituleQuestion() ;?> ?</p>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-7 form-group">
                                            <label for="detailAnswer">Détails calculs :</label>
                                            <textarea class="form-control" id="detailAnswer" name="justification<?php echo $question->getIdReponse() ?>" onkeyup="adjustHeightTextAreaLittle(this)" placeholder='Veuillez écrire ici les différentes étapes de calculs qui vous ont permis de trouver le résultat ...' maxlength="65535" required></textarea>
                                        </div>

                                        <div class="col-12 col-lg-5">

                                            <div class="row">
                                                <div class="col-12 form-group">
                                                    <label for="resultAnswer">Résultat :</label>
                                                    <input class="form-control" id="resultAnswer" name="reponse<?php echo $question->getIdReponse() ?>" type="number" placeholder="" step="0.001" required>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="uniteAnswer">Unité du Résultat :</label>
                                                    <select class="form-control" id="uniteAnswer" name="unite<?php echo $question->getIdReponse() ?>" type="text" placeholder="Sélectionnez l'unité du résultat" required>
                                                        <?php
                                                        $listeUnites = Unites::getConstants();

                                                        foreach ($listeUnites as $unite => $abreviation) { ?>
                                                            <option value="<?php echo $abreviation ?>"><?php echo $abreviation ?></option>";
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="exposantAnswer">Exposant du Résultat :</label>
                                                    <select class="form-control" id="exposantAnswer" name="exposant<?php echo $question->getIdReponse() ?>" type="text" placeholder="Sélectionnez l'exposant de l'unité" required>
                                                        <?php
                                                        $listeExposants = Exposants::getConstants();
                                                        $defautExposant = Exposants::getExposantParDefaut();

                                                        foreach ($listeExposants as $exposant) { ?>
                                                            <option <?php if($exposant==$defautExposant){ echo "selected ";} ?>value="<?php echo $exposant ?>"><?php echo $exposant ?></option>";
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="submit" class="sendSaisie" value="Envoyer">
                    </form>
                </div>
            </div>

        <?php  } else {

            $i=1;
            foreach ($_POST as $attribut => $value) {
                switch ($i) {
                    case 1:
                    $reponse['justification']=$value;
                    $i++;
                    break;
                    case 2:
                    $reponse['resultat']=$value;
                    $i++;
                    break;
                    case 3:
                    $reponse['resultatUnite']=$value;
                    $i++;
                    break;
                    case 4:
                    $reponse['exposantUnite']=$value;
                    $i=1;
                    $listeReponse[]=$reponse;
                    break;
                    default:
                    break;
                }
            }

            $idEleve =$eleveManager->getIdEleveByLogin($_SESSION['eleve']);
            $date = date("Y-m-d H:i:s");

            foreach ($listeReponse as $numeroReponse => $reponse) {
                $reponseObj = new ReponseEleve($reponse);
                $reponseObj->setDateResult($date);
                $reponseObj->setIdReponse($numeroReponse+1);
                $reponseObj->setIdSujet($idSujet);
                $reponseObj->setIdEleve($idEleve);
                $reponseObj->setPrecisionReponse($reponseEleveManager->calculerPrecisionReponse($reponseObj));

                $reponseEleveManager->importSaisie($reponseObj);

            } ?>
            <div class="messageEnvoiValide">
                <p>
                    <img src="image/valid.png">
                    Vos réponses ont été envoyées au professeur !
                </p>
            </div>
        <?php  }
    }
} ?>
