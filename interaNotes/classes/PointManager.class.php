<?php
class PointManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllPointsOfExamens($idExamen){

		$sql = 'SELECT idPoint, idExamen, nomPoint, unitePoint FROM points WHERE idExamen=:idExamen';

    $requete = $this->db->prepare($sql);
		$requete->bindValue(':idExamen', $idExamen);
		$requete->execute();

		while($point = $requete->fetch(PDO::FETCH_OBJ)){
			$listePoints[] = new Point($point);
		}

		$requete->closeCursor();
		return $listePoints;
	}

	public function getPoint($idPoint){
		$sql = 'SELECT idPoint,idExamen,nomPoint,unitePoint FROM points WHERE idPoint=:idPoint';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idPoint', $idPoint);
		$requete->execute();

		$point = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return new Point($point);
	}
}
