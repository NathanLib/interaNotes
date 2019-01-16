<?php 
$db = new Mypdo();
$correctionManager = new CorrigeManager($db);
$reponsesAttendusManager = new ResultatsAttendusManager($db);


$idExamen = 1;

$listeSujet = $reponsesAttendusManager->getlisteDesSujets($idExamen);
foreach ($listeSujet as $idSujet) {
	$listeCorrectionSujet[] = $correctionManager->calculerCorrection($idSujet);
}

var_dump($listeCorrectionSujet);

?>