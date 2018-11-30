<?php
$pdo = new Mypdo();
$examenManager = new ExamenManager($pdo);

$numExamen = 1; //WARNING : utiliser GET (avec listerExamen)
$_SESSION['examen'] = $examenManager->getExamen($numExamen);
?>

<div class="row justify-content-around">

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <div class="tictac">
            <div class="tictacHaut">
                <img class="iconTictac" src="image/exam.png" alt="exam" title="exam">
            </div>

            <div class="tictacBas">
                <a href="index.php?page=4">Créer un examen</a>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <div class="tictac">
            <div class="tictacHaut">
                <img class="iconTictac" src="image/liste.png" alt="exam" title="exam">
            </div>

            <div class="tictacBas">
                <a href="#">Mes examens</a>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <div class="tictac">
            <div class="tictacHaut">
                <img class="iconTictac" src="image/subject.png" alt="exam" title="exam">
            </div>

            <div class="tictacBas">
                <a href="#">Mes sujets types</a>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <div class="tictac">
            <div class="tictacHaut">
                <img class="iconTictac" src="image/student.png" alt="exam" title="exam">
            </div>

            <div class="tictacBas">
                <a href="#">Mes élèves</a>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <div class="tictac">
            <div class="tictacHaut">
                <img class="iconTictac" src="image/questions.png" alt="exam" title="exam">
            </div>

            <div class="tictacBas">
                <a href="#">Questions reçues</a>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-4 col-lg-2 TicTacAccueil">
        <div class="tictac">
            <div class="tictacHaut">
                <img class="iconTictac" src="image/parameter.png" alt="exam" title="exam">
            </div>

            <div class="tictacBas">
                <a href="#">Paramètres</a>
            </div>
        </div>
    </div>

</div>
