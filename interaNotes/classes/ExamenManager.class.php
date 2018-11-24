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

	public function getExamen($idExamen){

		$sql = 'SELECT idExamen, dateDepot, anneeScolaire FROM examen e
						WHERE e.idExamen=:idExamen';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idExamen', $idExamen);
		$requete->execute();

		$examen = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();
		return new Examen($examen);
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
