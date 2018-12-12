<?php
class EnonceManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getEnonce($idEnonce){

		$sql = 'SELECT idEnonce, titre, consigne FROM enonce e
            WHERE e.idEnonce=:idEnonce';

		$requete = $this->db->prepare($sql);
    $requete->bindValue(':idEnonce', $idEnonce);
		$requete->execute();

		$enonce = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();
		return new Enonce($enonce);
	}

	public function insererTableauEnonces($enonces) {
		foreach ($enonces as $enonce) {
			$sql = 'INSERT INTO enonce(idEnonce, titre, consigne) VALUES (:id,:titre,:consigne) ';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':id', $enonce->getIdEnonce());
			$requete->bindValue(':titre', $enonce->getTitreEnonce());
			$requete->bindValue(':consigne', $enonce->getConsigneEnonce());
			$requete->execute();

			$requete->closeCursor();
		}
	}
}
