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

	public function insererTableauExercices2($exercices) {
		$exercicesTableaux = $this->preparationRequeteTableauExercices($exercices);

		$args = array_fill(0, count($exercicesTableaux[0]), '?');

		$sql = "INSERT INTO exercicegenere(idSujet, idValeur) VALUES (".implode(',', $args).")";
		$requete = $this->db->prepare($sql);

		foreach ($exercicesTableaux as $row)
		{
			$requete->execute($row);
		}

		$requete->closeCursor();
	}

	private function preparationRequeteTableauExercices($exercicesObjets){
		foreach ($exercicesObjets as $exercice) {
      $exercicesTableaux[] = array($exercice->getIdSujet(), $exercice->getIdValeur());
    }

		return $exercicesTableaux;
	}
}
