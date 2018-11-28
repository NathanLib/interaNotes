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
		return $listeExamens;
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
}
