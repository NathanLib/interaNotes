<?php require_once("include/verifEleve.inc.php"); 

$pdo = new Mypdo();
$sujetManager = new SujetManager($pdo);
$enonceManager = new EnonceManager($pdo);
$examenManager = new ExamenManager($pdo);

$valeurManager = new ValeurManager($pdo);
$pointManager = new PointManager($pdo);


$idSujet = $sujetManager->getIdSujetByLogin($_SESSION['eleve']);
$sujet = $sujetManager->getSujet($idSujet);
$enonceSujet = $enonceManager->getEnonce($sujet->getIdEnonce());

$valeurs = $valeurManager->getValeursSujet($idSujet);

?>



<div class="row mySubject">
    <div class="row">
        <div class="col-8">
            <p>
                <span>Titre de l'énoncé : </span>
                <?php echo $enonceSujet->getTitreEnonce(); ?> 
            </p>
        </div>
        <div class="col-8">
            <p>
                <span>Date de fin : </span>
                <?php echo $examenManager->getDateLimitebySujet($idSujet); ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
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
    <a href="index.php?page=15"><button>Saisir les réponses</button></a>
</div>


<?php /*  En 2016, la fusée Ariane 5 a décollé du Centre Spatial Guyanais en direction de <span>[["destinationPlanete"]]</span> qui se situe à <span>[["distanceDestination"]] Kms</span> de notre chère Terre !
                    <br><br>
                    Nous savons que la fusée possède <span>[["nbMoteur"]] moteur(s)</span> et que chaque moteur à une vitesse qui équivaut à <span>[["vitesseMoteur"]] Km/H</span> et a une consommation de carburant qui vaut <span>[["consoCarburantParMoteur"]] Tonnes/1000 Kms</span> !
                    <br><br>
                    A bord de cette fusée, l'équipage est constitué de <span>[["nbPersonne"]]</span> et chaque personne consonne <span>[["consoNourritureParPersonne"]] Kgs</span> de nourriture, <span>[["consoEauParPersonne"]] L</span> d'eau et <span>[["consoO2ParPersonne"]] L</span> d'O² par jour. */ ?>
