<?php
class ValeurManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllValeursOfPoints($idPoint){

		$sql = 'SELECT idValeur, idPoint, valeur FROM valeurs WHERE idPoint=:id';

    $requete = $this->db->prepare($sql);
		$requete->bindValue(':id', $idPoint);
		/*$requete->bindValue(':id', $idPoint->getIdPoint());*/
		$requete->execute();

		while($valeur = $requete->fetch(PDO::FETCH_OBJ)){
			$listeValeurs[] = new Valeur($valeur);
		}

		$requete->closeCursor();
		return $listeValeurs;
	}

	public function getValeurSujet($idSujet){

		$sql = 'SELECT idValeur FROM exercicegenere e WHERE e.idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		while($valeur = $requete->fetch(PDO::FETCH_OBJ)){
			$listeValeur[] = new Valeur($valeur);
		}

		$requete->closeCursor();

		return $listeValeur;
	}

	public function getPointFromValeur($idValeur){

		$sql = 'SELECT idPoint FROM valeurs WHERE idValeur=:idValeur';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idValeur', $idValeur);
		$requete->execute();

		$idPoint = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $idPoint->idPoint;
	}

	public function getPoint($idPoint){
		$sql = 'SELECT * FROM points WHERE idPoint=:idPoint';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idPoint', $idPoint);
		$requete->execute();

		$point = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $point;
	}

	public function getValeur($idValeur){
		$sql = 'SELECT valeur FROM valeurs WHERE idValeur=:idValeur';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idValeur', $idValeur);
		$requete->execute();

		$valeur = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $valeur->valeur;
	}
}
