<?php 
$db = new Mypdo();
$formuleManager = new FormuleManager($db);
$corrigeManager = new CorrigeManager($db);
echo "<pre>";var_dump($corrigeManager->calculerCorrection($_GET['id']));echo "</pre>";

?>