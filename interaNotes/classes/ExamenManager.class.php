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

	public function creerExamen($dateLimite,$anneeScolaire) {
		$sql = 'INSERT INTO examen(dateDepot,anneeScolaire) VALUES (:dateDepot,:anneeScolaire)';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':dateDepot',$dateLimite);
		$requete->bindValue(':anneeScolaire',2018);
		$requete->execute();

		$requete->closeCursor();
	}

	public function creerQuestion($questions) {

		$i = 0;
		foreach ($questions as $key => $value) {

			switch ($key) {
				case 'intituleQuestion'.$i:
				$question['intituleQuestion'] = $value;
				break;
				case 'bareme'.$i:
				$question['bareme'] = $value;
				if(!isset($questions['valeurParfaite'.$i])){
					$listeQuestions[]=$question;
					$i++;
					$question['intituleQuestion']=null;
					$question['bareme']=null;
					$question['valeurParfaite']=null;
				}
				break;
				case 'valeurParfaite'.$i:
				$question['valeurParfaite'] = $value;
				$listeQuestions[]=$question;
				$i++;
				$question['intituleQuestion']=null;
				$question['bareme']=null;
				$question['valeurParfaite']=null;
				break;
				default:
				break;
			}
		}
		
		$idExamen = $this->db->lastInsertId(); 
		$i = 1;

		foreach ($listeQuestions as $key => $value) {

			$sql = 'INSERT INTO question(idQuestion,idExamen,intituleQuestion,baremeQuestion,estValeurParfaite) VALUES (:idQuestion,:idExamen,:intituleQuestion,:baremeQuestion,:estValeurParfaite)';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':idQuestion',$i);
			$requete->bindValue(':idExamen',$idExamen);
			$requete->bindValue(':intituleQuestion',$value['intituleQuestion']);
			$requete->bindValue('baremeQuestion',$value['bareme']);
			if (isset($value['valeurParfaite'])){
				$requete->bindValue(':estValeurParfaite',1); //true
			} else {
				$requete->bindValue(':estValeurParfaite',0); //false
			}
			
			$requete->execute();
			$i++;
		}
		
	} 
}
