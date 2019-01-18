<?php
class NoteManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getNoteByIdSujet($idSujet){
		$sql = 'SELECT idEleve, idSujet, note FROM note WHERE idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$note = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return new Note($note);
	}
}
