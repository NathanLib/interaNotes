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
}
