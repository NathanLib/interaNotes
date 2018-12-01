<?php
class SujetManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllSujetsOfExamen($idExamen){

		$sql = 'SELECT idSujet, idEnonce, semestre, idExamen FROM sujet WHERE idExamen=:idExamen ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idExamen',$idExamen);
		$requete->execute();

		while($sujet = $requete->fetch(PDO::FETCH_OBJ)){
			$listeSujet[] = new Sujet($sujet);
		}

		$requete->closeCursor();
		return $listeSujet;
	}

	public function getSujet($idSujet){

		$sql = 'SELECT idSujet, idEnonce, semestre, idExamen FROM sujet s
						WHERE s.idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$sujet = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return new Sujet($sujet);
	}

	/*public function recupererSujetComplet($idSujet){

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
	}*/

	public function getIdSujetByLogin($login) {
		$sql = 'SELECT s.idSujet FROM sujet s 
					JOIN exerciceattribue e 
					JOIN personne p 
					ON s.idSujet=e.idSujet AND e.idEleve=p.idPersonne AND p.login=:login';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':login', $login);
		$requete->execute();

		$sujet = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $sujet->idSujet;
	}

}
