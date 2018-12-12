<?php
class ExerciceGenereManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function insererTableauExercices($exercices) {
		foreach ($exercices as $exercice) {
			$sql = 'INSERT INTO exercicegenere(idSujet, idValeur) VALUES (:idSujet,:idValeur) ';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':idSujet', $exercice->getIdSujet());
			$requete->bindValue(':idValeur', $exercice->getIdValeur());
			$requete->execute();

			$requete->closeCursor();
		}
	}
}
