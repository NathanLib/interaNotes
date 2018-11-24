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

	public function getValeursSujet($idSujet){
		$sql = 'SELECT v.idValeur, v.idPoint, v.valeur FROM valeurs v
						INNER JOIN exercicegenere e ON(e.idValeur = v.idValeur)
						WHERE e.idSujet = :idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		while($valeur = $requete->fetch(PDO::FETCH_OBJ)){
			$listeValeurs[] = new Valeur($valeur);
		}

		$requete->closeCursor();

		return $listeValeurs;
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
