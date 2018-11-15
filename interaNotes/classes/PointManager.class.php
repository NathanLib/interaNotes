<?php
class PointManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllValeursOfPoints($idPoint){

		$sql = 'SELECT idValeur, idPoint, valeur FROM valeurs WHERE idPoint=:idPoint';

    $requete = $this->db->prepare($sql);
		$requete->bindValue(':idPoint', $idPoint);
		$requete->execute();

		while($valeur = $requete->fetch(PDO::FETCH_OBJ)){
			$listeValeurs[] = new Valeur($valeur);
		}

		$requete->closeCursor();
		return $listeValeurs;
	}
}
