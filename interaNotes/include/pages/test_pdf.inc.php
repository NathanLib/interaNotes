<?php

require('../../classes/pdf.class.php');

$titre="Simulation de fusée";

$texte="Selon les paramètres suivants, indiquez le nombre de jours ainsi que les quantités nécessaires d'O2, de carburant, de nourriture et d'eau pour atteindre Lune : 
	-nombre de moteurs : 1 
	-vitesse : 1000 km/h 
	-Consommation de carburant par moteur : 100 tonnes/1000km 
	-Consommation d'eau par jour par personne : 1,5L 
	-Consommation de nourriture par personne par journée : 2 Kg 
	-Consommation d'O² par personne par jour : 60L 
	-Le nombre de personnes dans l'équipage : 3 
	-Destination : Lune 
	-Distance Terre/Lune : 340000";

	$date = "30/11/2018 00:00:00";

	$consigne="Selon les paramètres énoncés précédemment, veuillez indiquer les quantités nécessaires d'O², de carburant, de nourriture et d'eau pour que la fusée Ariane 5 atteigne sa destination.";

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->SetTitle("Sujet_XXXXX");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddTitre($titre);
$pdf->AddDate($date);
$pdf->AddEnonce($texte);
$pdf->AddConsigne($consigne);
$pdf->AddImages(null);
$pdf->Output();
?>
