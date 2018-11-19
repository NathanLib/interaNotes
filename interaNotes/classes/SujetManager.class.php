<?php
class SujetManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllSujet($idExamen){

		$sql = 'SELECT * FROM sujet WHERE idExamen=:idExamen ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idExamen',$idExamen);
		$requete->execute();

		while($sujet = $requete->fetch(PDO::FETCH_OBJ)){
			$listeSujet[] = new Sujet($sujet);
		}

		$requete->closeCursor();
		return $listeSujet;
	}

	public function recupererSujet($idSujet){

		$sql = 'SELECT titre,consigne,dateDepot FROM sujet s
						INNER JOIN enonce en ON (en.idEnonce = s.idEnonce)
						INNER JOIN examen ex ON (ex.idExamen = s.idExamen)
						WHERE s.idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$sujet = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $sujet;
	}

}
