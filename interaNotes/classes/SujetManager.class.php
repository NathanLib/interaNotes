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

	public function getIdSujetByLogin($login) {
		$sql = 'SELECT s.idSujet FROM sujet s
						INNER JOIN exerciceattribue e ON(e.idSujet=s.idSujet)
						INNER JOIN personne p ON(p.idPersonne=e.idEleve)
						WHERE p.login=:login';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':login', $login);
		$requete->execute();

		$sujet = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		if(!$sujet){
			return false;
		}
		return $sujet->idSujet;
	}

	public function getIdSujetPossible(){
		$sql = 'SELECT max(idSujet) as maxId FROM sujet';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		$sujet = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		if($sujet->maxId == null){
			return 1;
		}
		return $sujet->maxId +1;
	}

}
