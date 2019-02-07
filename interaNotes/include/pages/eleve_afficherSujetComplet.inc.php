<?php

if(isset($_GET['id'])){ //WARNING gérer quand l'id n'existe pas dans la base

$idSujet = $_GET['id'];

$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);


if($sujetManager->exists($idSujet)){

    $valeurManager = new ValeurManager($pdo);
    $pointManager = new PointManager($pdo);
    $questionManager = new QuestionManager($pdo);
    $eleveManager = new EleveManager($pdo);

    $sujet = $sujetManager->getSujet($idSujet);
    $enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());
    $examenSujet = $examenManager->getExamen($sujet->getIdExamenOfSujet());

    $personneManager = new PersonneManager($pdo);
    $PersonneEleve = $personneManager->getPersonneByLogin($_SESSION['eleve']);
    $personne = $personneManager->getNomPrenomParSujet($idSujet);
    $eleve = $eleveManager->getEleve($PersonneEleve);
    $valeurs = $valeurManager->getValeursSujet($idSujet);

    $titre = $enonceSujet->getTitreEnonce();
    $enonce = $enonceSujet->getConsigneEnonce();
    $question = $questionManager->getAllQuestion($idSujet);
    $dateDepot = $examenSujet->getDateDepotExamen();
    $dateActuelle = date("Y-m-d H:i:s");

    $image1 = "image/examen1/sujet".$idSujet."/FuséeMoteur".$valeurs[0]->getValeur().".jpg";
    $image2 = "image/examen1/sujet".$idSujet."/Astronaute".$valeurs[2]->getValeur().".jpg";

    if ($dateDepot > $dateActuelle) { ?>
        <h1>Erreur</h1>
        <p>La date de fin du sujet n'est pas encore dépassée</p>
    <?php } else { ?>
        <div class="row d-flex justify-content-center headCreateExam">
            <div class="col-12 col-md-4">
                <p>N° étudiant : <span><?php echo $PersonneEleve->getIdPersonne(); ?></span> </p>
            </div>
            <div class="col-12 col-md-4">
                <p>N° Sujet : <span><?php echo $idSujet; ?></span> </p>
            </div>
            <div class="col-12 col-md-4">
                <p>Sujet de : <span><?php echo ($PersonneEleve->getNomPersonne().' '.$PersonneEleve->getPrenomPersonne()); ?></span> </p>
            </div>
        </div>
        <div class="row mySubject">
            <div class="row">
                <div class="col-12">
                    <p>
                        <h1 style="text-align: center;"><?php echo $titre.' - '.$eleve->getNomPromotion().' - '.$eleve->getAnneeInscription(); ?></h1>
                    </p>
                </div>
            </div>

            <div class="row" style="clear: both; width: 100%;" >
                <div class="col-12">
                    <div>
                        <span id="subjectTitle">Enoncé :</span>
                        <br>
                        <p style="margin-left: 18px;"class="textSubject">
                            <?php echo $enonce; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row" style="clear: both; width: 100%;" >
                <div class="col-12">
                    <div>
                        <span id="subjectTitle">Valeurs :</span>
                        <br>
                    </div>
                </div>
            </div>     
            <table>
                <tr>
                    <th style="border: thin solid black; text-align: center;">
                        Nombre moteurs 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Vitesse de la fusée 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Nombre de personnes  
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Destination 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Distance 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Consommation de carburant 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Consommation d'eau 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Consommation de nourriture 
                    </th>
                    <th style="border: thin solid black; text-align: center;">
                        Consommation d'oxygène 
                    </th>
                </tr>
                <tr>
                    <?php foreach ($valeurs as $val) { 
                        ?>
                        <th style="border: thin solid black; text-align: center; margin: 5px 15px 5px 15px;">

                            <?php echo($val->getValeur()); ?>

                        </th>
                    <?php } ?>
                </tr>
            </table>
            <br>

            <div class="row" style="width: 100%;">
                <div class="col-12">
                    <div>
                        <span id="subjectTitle">Questions :</span>
                        <br>
                        <p class="textSubject">
                            <ul style="list-style-type: decimal;">
                                <?php foreach ($question as $numQuestion) { ?>
                                    <li><?php echo $numQuestion->getIntituleQuestion(); ?></li>


                                <?php } ?>
                            </ul>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <span id="subjectTitle">Images :</span>
                        <br>

                        <div class="row justify-content-around">
                            <img style="border:solid #333 1px; border-collapse: collapse; padding: 0;"  class="col-12 col-sm-6 col-md-4 col-lg-2 rounded subjectPictureOne" src=<?php echo $image1; ?> >

                            <img style="border:solid #333 1px; border-collapse: collapse; padding: 0;"  class="col-12 col-sm-6 col-md-4 col-lg-2 rounded subjectPictureTwo" src=<?php echo $image2; ?> >
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                                <div class="boutonCorrection">
                                    <a href="index.php?page=16&amp;id=<?php echo $idSujet;?>">
                                        <input type=button value="Voir corrigé"></input>
                                    </a>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                                <div class="boutonTelecharger">
                                    <?php
                                    $_SESSION['sujet'] = $arrayName = array('idSujet' => $idSujet,'titre' => $titre, 'date' => $dateDepot, 'enonce' => $enonce,'image1' => $image1, 'image2' => $image2);
                                    ?>
                                    <a href="include/pages/test_pdf.inc.php" target="_blank">
                                        <input type=button value="Télécharger"></input>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr" style="width:100%; border:solid #333 1px; border-collapse: collapse; margin-top: 2%;">

                    <div class="row d-flex justify-content-center w-100 headCreateExam">
                        <div class="col-12 col-md-4">
                            <p>Pierre CARRILLO </p>
                        </div>
                        <div class="col-12 col-md-4">
                            <p>IUT du Limousin - GMP</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <p>Page 1/1</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }else{
        header('Location: index.php?page=3');
    }
}else{
    header('Location: index.php?page=3');
}?>
