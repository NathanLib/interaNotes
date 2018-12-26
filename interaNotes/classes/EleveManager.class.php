<?php
class EleveManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

  public function getIdEleveByLogin($login){

		$sql = 'SELECT idEleve FROM eleve e INNER JOIN personne p ON(p.idPersonne=e.idEleve) WHERE p.login=:login';
		$req = $this->db->prepare($sql);
		$req->bindValue(':login',$login,PDO::PARAM_STR);
		$req->execute();

		$res = $req->fetch(PDO::FETCH_OBJ);
		$req->closeCursor();

		return $res->idEleve;
	}

	public function getEleve($personne){

		$sql = 'SELECT annee, nomPromo FROM eleve WHERE idEleve = :id';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':id', $personne->getIdPersonne());
		$requete->execute();

		$eleve = $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();

		return new Eleve($personne, $eleve);
	}

	/*public function getNomPrenomParSujet($idSujet){

		$sql = 'SELECT nom, prenom FROM personne p
		INNER JOIN eleve e ON(p.idPersonne=e.idEleve)
		INNER JOIN exerciceattribue ex ON(e.idEleve=ex.idEleve)
		WHERE ex.idSujet=:idSujet ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$personne = $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();

		return new Personne($personne);
	}*/

}
