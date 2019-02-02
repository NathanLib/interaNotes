<?php
class ExamenManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllExamens(){

		$sql = 'SELECT idExamen, dateDepot, anneeScolaire FROM examen';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while($examen = $requete->fetch(PDO::FETCH_OBJ)){
			$listeExamens[] = new Examen($examen);
		}

		$requete->closeCursor();

		if(isset($listeExamens)){
			return $listeExamens;
		}

		return false;
	}

	public function getAllExamensAttribues(){

		/*$sql = 'SELECT e.idexamen, e.dateDepot, e.anneeScolaire FROM (
						SELECT DISTINCT s.idExamen FROM sujet s
						WHERE s.idSujet IN (select idSujet FROM exerciceattribue)) T
						INNER JOIN examen e ON(e.idExamen=T.idExamen)';*/

		$sql = 'SELECT DISTINCT s.idExamen FROM sujet s
						WHERE s.idSujet IN (select idSujet FROM exerciceattribue)';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while($examen = $requete->fetch(PDO::FETCH_OBJ)){
			$listeIdExamens[] = $examen->idExamen;
		}

		$requete->closeCursor();

		if(isset($listeIdExamens)){
			return $listeIdExamens;
		}
		return false;
	}

	public function examenEstAttribue($listeExamensObjets, $idExamen){
		foreach($listeExamensObjets as $examen){
			if($examen->getIdExamen() === $idExamen){
				return true;
			}
		}

		return false;
	}

	public function getExamen($idExamen){

		$sql = 'SELECT idExamen, dateDepot, anneeScolaire FROM examen e
						WHERE e.idExamen=:idExamen';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idExamen', $idExamen);
		$requete->execute();

		$examen = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();
		return new Examen($examen);
	}

	/*Pas encore terminée*/
	public function genererSujetOfExamen2($idExamen){
		$pdo = new Mypdo();
		$pointManager = new PointManager($pdo);
    	$valeurManager = new ValeurManager($pdo);

		$listePoints = $pointManager->getAllPointsOfExamens(1);

		foreach($listePoints as $point){
			$listeValeurs = $valeurManager->getAllValeursOfPoints($point->getIdPoint());

			foreach($listeValeurs as $valeur){
				$listeValeursDePoints[] = array('idPoint'=>$point->getIdPoint(), 'idValeur'=>$valeur->getIdValeur());
			}
		}

		return $listeValeursDePoints;
	}

	public function getDateLimitebySujet($idSujet){
		$sql = 'SELECT dateDepot FROM examen e JOIN sujet s ON e.idExamen=s.idExamen AND s.idSujet=:idSujet ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet',$idSujet);
		$requete->execute();

		$date = $requete->fetch(PDO::FETCH_OBJ);

		$requete->closeCursor();

		return $date->dateDepot;
	}

	public function dateLimiteEstDepassee ($date){
		$now = new DateTime(date("Y:m:d H:i:s"));
		$limite = new DateTime($date);

		return $now>$limite;

	}
}
