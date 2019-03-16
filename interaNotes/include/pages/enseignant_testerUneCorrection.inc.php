<?php
$db = new Mypdo();
$correctionManager = new CorrigeManager($db);
$reponsesAttendusManager = new ResultatsAttendusManager($db);

$idExamen = $_SESSION['examen']->getIdExamen();
$listeSujet = $reponsesAttendusManager->getlisteDesSujets($idExamen);


var_dump($listeSujet);
foreach ($listeSujet as $idSujet) {
	$listeCorrectionSujet[] = $correctionManager->calculerCorrection($idSujet,true);
}

var_dump($listeCorrectionSujet);

?>
