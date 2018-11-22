<?php
class PersonneManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getNomPrenomParSujet($idSujet){

		$sql = 'SELECT nom, prenom FROM personne p JOIN exerciceattribue ex JOIN eleve e ON p.idPersonne=e.idEleve AND e.idEleve=ex.idEleve AND ex.idSujet=:idSujet ';

		$requete = $this->db->prepare($sql);
    	$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$personne = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		
		return new Personne($personne);

	}
}
