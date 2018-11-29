<?php
$db = new Mypdo();
$corrigeManager = new CorrigeManager($db);
echo "<pre>";var_dump($corrigeManager->calculerCorrection($_GET['id']));echo "</pre>";

?>
