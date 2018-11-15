<!--Remplacer chaque valeur par des données provenant de la bd (jeu d'essai)-->

<?php $db = new Mypdo();
	$manager = new SujetManager($db) 
	$sujet = $manager->afficherSujet(1) ?>

<div id="sujet">
  <p>Titre : XXX</p>
  <p>Date de fin : jj/mm/yyyy
  <p>Consignes : Lorem Ipsum</p>
</div>
