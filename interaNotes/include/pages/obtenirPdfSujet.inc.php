<?php
session_start();
require('../../classes/PDF.class.php');

$consigne="Selon les paramètres énoncés précédemment, veuillez indiquer les quantités nécessaires d'O², de carburant, de nourriture et d'eau pour que la fusée Ariane 5 atteigne sa destination.";

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->SetTitle("Sujet_".$_SESSION['sujet']['idSujet']);
$pdf->AliasNbPages();
$pdf->AddPage('','',0);
$pdf->AddTitre($_SESSION['sujet']['titre']);
$pdf->AddDate($_SESSION['sujet']['date']);
$pdf->AddEnonce($_SESSION['sujet']['enonce']);
$pdf->AddImages($_SESSION['sujet']['image1'],$_SESSION['sujet']['image2']);
$pdf->Output();
?>
