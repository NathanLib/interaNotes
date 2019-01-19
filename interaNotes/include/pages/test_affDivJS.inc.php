<?php $db = new Mypdo();
$corrigeManager = new CorrigeManager($db);

$corrigeManager->calculerCorrection(1);

?>

