<?php
class ExamenManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllExamens(){

		$sql = 'SELECT idExamen, dateDepot, anneeScolaire FROM examen';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while($examen = $requete->fetch(PDO::FETCH_OBJ)){
			$listeExamens[] = new Examen($examen);
		}

		$requete->closeCursor();
		return $listeExamens;
	}

	/*public function genererSujetsDeExamen($numVille){

		$sql = 'SELECT vil_num, vil_nom FROM ville WHERE vil_num = :num';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':num', $numVille);
		$requete->execute();

		$ville = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		$newVille = new Ville($ville);
		return $newVille;
	}*/
}
