<?php require_once("include/verifEnseignant.inc.php"); ?>


<?php
$pdo = new Mypdo();
$examenManager = new ExamenManager($pdo);

$numExamen = 1; //WARNING : utiliser GET (avec listerExamen)
$_SESSION['examen'] = $examenManager->getExamen($numExamen);
?>
<div class="row justify-content-around">

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <a href="index.php?page=4">
            <div class="tictac">
                <div class="tictacHaut">
                    <img class="iconTictac" src="image/exam.png" alt="exam" title="exam">
                </div>

                <div class="tictacBas">
                    Créer un examen
                </div>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <a href="#">
            <div class="tictac">
                <div class="tictacHaut">
                    <img class="iconTictac" src="image/liste.png" alt="exam" title="exam">
                </div>

                <div class="tictacBas">
                    Mes examens
                </div>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <a href="index.php?page=2">
            <div class="tictac">
                <div class="tictacHaut">
                    <img class="iconTictac" src="image/student.png" alt="exam" title="exam">
                </div>

                <div class="tictacBas">
                    Mes élèves
                </div>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <a href="#">
            <div class="tictac">
                <div class="tictacHaut">
                    <img class="iconTictac" src="image/questions.png" alt="exam" title="exam">
                </div>

                <div class="tictacBas">
                    Questions reçues
                </div>
            </div>
        </a>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <a href="index.php?page=26">
            <div class="tictac">
                <div class="tictacHaut">
                    <img class="iconTictac" src="image/parameter.png" alt="exam" title="exam">
                </div>

                <div class="tictacBas">
                    Mon compte
                </div>
            </div>
        </a>
    </div>

</div>
