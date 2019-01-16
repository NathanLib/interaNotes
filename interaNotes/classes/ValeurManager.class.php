<?php
class ValeurManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllValeursOfPoints($idPoint){

		$sql = 'SELECT idValeur, idPoint, valeur, uniteValeur, exposantValeur FROM valeurs WHERE idPoint=:id';

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
		$sql = 'SELECT v.idValeur, v.idPoint, v.valeur, v.uniteValeur, v.exposantValeur FROM valeurs v
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

	public function getIdPointByIdValeur($idValeur){

		$sql = 'SELECT idPoint FROM valeurs v WHERE idValeur=:id';

    $requete = $this->db->prepare($sql);
		$requete->bindValue(':id', $idValeur);
		/*$requete->bindValue(':id', $idPoint->getIdPoint());*/
		$requete->execute();

		$idPoint = $requete->fetch(PDO::FETCH_OBJ);

		return $idPoint->idPoint;

		$requete->closeCursor();

	}

	public function compterNbValeurs($idValeur){
		$sql = 'SELECT COUNT(idValeurDependante) AS nb FROM dependances d WHERE idValeurDependante=:id';

    $requete = $this->db->prepare($sql);
		$requete->bindValue(':id', $idValeur);
		/*$requete->bindValue(':id', $idPoint->getIdPoint());*/
		$requete->execute();

		$nb = $requete->fetch(PDO::FETCH_OBJ);

		return $nb->nb;

		$requete->closeCursor();
	}

	public function listerValeurDependante($idValeurDependante){
		$sql = 'SELECT d.idValeur,idPoint,valeur,uniteValeur,exposantValeur FROM dependances d JOIN valeurs v ON v.idValeur=d.idValeurDependante WHERE d.idValeurDependante=:id';

    $requete = $this->db->prepare($sql);
		$requete->bindValue(':id', $idValeurDependante);
		/*$requete->bindValue(':id', $idPoint->getIdPoint());*/
		$requete->execute();

		while($valeur = $requete->fetch(PDO::FETCH_OBJ)){
			$listeValeurs[] = new Valeur($valeur);
		}

		return $listeValeurs;

		$requete->closeCursor();
	}
}
