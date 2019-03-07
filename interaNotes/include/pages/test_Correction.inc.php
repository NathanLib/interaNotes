<?php
$db = new Mypdo();
$correctionManager = new CorrigeManager($db);
$reponsesAttendusManager = new ResultatsAttendusManager($db);


$idExamen = $_SESSION['examen']->getIdExamen(); //WARNING : utiliser la var de session

$listeSujet = $reponsesAttendusManager->getlisteDesSujets($idExamen);
foreach ($listeSujet as $idSujet) {
	$listeCorrectionSujet[] = $correctionManager->calculerCorrection($idSujet,true);
}

var_dump($listeCorrectionSujet);

?>
