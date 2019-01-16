<?php
class ResultatsAttendusManager {
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getlisteDesSujets($idExamen){
		$sql = 'SELECT idSujet FROM sujet s WHERE s.idExamen = :id';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':id', $idExamen);
		$requete->execute();

		while($res = $requete->fetch(PDO::FETCH_ASSOC)){
			$listeIdSujets[] = $res['idSujet'];
		}

		$requete->closeCursor();

		return $listeIdSujets;
	}

	public function insererTableauCorrection($resultatsAttendus) {
		$exercicesTableaux = $resultatsAttendus;

		$args = array_fill(0, count($exercicesTableaux[0]), '?');

		$this->db->beginTransaction();
		$sql = "INSERT INTO exercicegenere(idSujet, idValeur) VALUES (".implode(',', $args).")";
		$requete = $this->db->prepare($sql);

		foreach ($exercicesTableaux as $row)
		{
			$requete->execute($row);
		}
		$resultat = $this->db->commit();

		$requete->closeCursor();
		return $resultat;
	}
}
