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

	public function calculerNotePourUneQuestion($question, $reponsesEleve){
		$bareme = $question->getBaremeQuestion();
		$precision = $reponsesEleve->getPrecisionReponse();

		$note=round(($bareme*$precision)/100, 2);
		return $note;
	}

	public function insererNote($idSujet, $idEleve, $note){
		$sql = 'INSERT INTO note (idEleve, idSujet, note) VALUES (:idEleve, :idSujet, :note)';
		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idEleve', $idEleve);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->bindValue(':note', $note);
		$requete->execute();
	}

	public function updateNote($idSujet, $idEleve, $note){
		$sql = 'UPDATE note SET note=:note WHERE idEleve=:idEleve AND idSujet=:idSujet';
		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idEleve', $idEleve);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->bindValue(':note', $note);
		$requete->execute();
	}

	public function noteExist($idSujet, $idEleve){
		$sql = 'SELECT idEleve, idSujet, note FROM note WHERE idSujet=:idSujet AND idEleve=:idEleve';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->bindValue(':idEleve', $idEleve);
		$requete->execute();

		$exist = $requete->fetch(PDO::FETCH_OBJ);

		if (!isset($exist->idEleve)) {
			return false;
		}

		return true;
	}
}
