<?php
$pdo = new Mypdo();
$examenManager = new ExamenManager($pdo);

$numExamen = 1; //WARNING : utiliser GET (avec listerExamen)
$_SESSION['examen'] = $examenManager->getExamen($numExamen);
?>

<div class="tictac">
    <div class="tictacHaut">
        <img class="iconTictac" src="image/exam.png" alt="exam" title="exam">
    </div>

    <div class="tictacBas">
        <a href="index.php?page=11">Créer un examen</a>
    </div>
</div>
