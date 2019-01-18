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

    $sujet = $sujetManager->getSujet($idSujet);
    $enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());
    $examenSujet = $examenManager->getExamen($sujet->getIdExamenOfSujet());

    $personneManager = new PersonneManager($pdo);
    $personne = $personneManager->getNomPrenomParSujet($idSujet);
    $valeurs = $valeurManager->getValeursSujet($idSujet);

    $titre = $enonceSujet->getTitreEnonce();
    $enonce = $enonceSujet->getConsigneEnonce();
    $dateDepot = $examenSujet->getDateDepotExamen();
    $dateActuelle = date("Y-m-d H:i:s");

    $image1 = "image/sujet/FuséeMoteur".$valeurs[0]->getValeur().".jpg";
    $image2 = "image/sujet/Astronaute".$valeurs[2]->getValeur().".jpg";

    if ($dateDepot > $dateActuelle) { ?>
        <h1>Erreur</h1>
        <p>La date de fin du sujet n'est pas encore dépassée</p>
    <?php } else { ?>
        <div class="row mySubject">
            <div class="row">
                <div class="col-12">
                    <p>
                        <span>Titre de l'énoncé : </span>
                        <?php echo $titre; ?>
                    </p>
                </div>
                <div class="col-12">
                    <p>
                        <span>Date de fin : </span>
                        <?php echo $dateDepot ?>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div>
                        <span id="subjectTitle">Enoncé :</span>
                        <br>
                        <p class="textSubject">
                            <?php echo $enonce; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <span id="subjectTitle">Images :</span>
                    <br>

                    <div class="row justify-content-around">
                        <img class="col-12 col-sm-6 col-md-4 col-lg-2 rounded subjectPictureOne" src=<?php echo $image1; ?> >

                        <img class="col-12 col-sm-6 col-md-4 col-lg-2 rounded subjectPictureTwo" src=<?php echo $image2; ?> >
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-4 col-md-2 d-flex justify-content-center">
                            <div class="boutonCorrection">
                                <a href="index.php?page=21&amp;id=<?php echo $sujet->getIdSujet();?>">
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
            </div>
        </div>
    <?php }
}else{
    header('Location: index.php?page=3');
}
}else{
    header('Location: index.php?page=3');
}?>
