<?php
class SujetManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllSujet($idExamen){

		$sql = 'SELECT * FROM sujet WHERE idExamen=:idExamen ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idExamen',$idExamen)
		$requete->execute();

		while($sujet = $requete->fetch(PDO::FETCH_OBJ)){
			$listeSujet[] = new Sujet($sujet);
		}

		$requete->closeCursor();
		return $listeSujet;
	}

	public function afficherSujet($idSujet){

		$sql = 'SELECT titre,consigne,dateDepot FROM sujet s JOIN enonce en JOIN examen ex WHERE s.idEnonce = en.idEnonce AND ex.idExamen=s.idExamen AND s.idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$sujet = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $sujet;
	}

	public function getValeurSujet($idSujet){

		$sql = 'SELECT idValeur FROM exercicegenere e WHERE e.idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		$valeur = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $valeur;
	}
}
