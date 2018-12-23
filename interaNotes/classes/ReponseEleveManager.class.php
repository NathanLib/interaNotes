<?php
class ReponseEleveManager{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function importSaisie($reponseObj){
		$sql = 'INSERT INTO resultatseleves(dateResult,idEleve,idSujet,idReponse,resultat,exposantUnite,resultatUnite,justification,precisionReponse) VALUES (:dateResult,:idEleve,:idSujet,:idReponse,:resultat,:exposantUnite,:resultatUnite,:justification,:precisionReponse) ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':dateResult', $reponseObj->getDateResult());
		$requete->bindValue(':idEleve', $reponseObj->getIdEleve());
		$requete->bindValue(':idSujet', $reponseObj->getIdSujet());
		$requete->bindValue(':idReponse',$reponseObj->getIdReponse());
		$requete->bindValue(':resultat', $reponseObj->getResultat());
		$requete->bindValue(':exposantUnite', $reponseObj->getExposantUnite());
		$requete->bindValue(':resultatUnite', $reponseObj->getResultatUnite());
		$requete->bindValue(':justification', $reponseObj->getJustification());
		$requete->bindValue(':precisionReponse', $reponseObj->getPrecisionReponse());
		$requete->execute();
	}

	public function getAllReponseEleve($idSujet){
		$sql = 'SELECT dateResult,resultat,idReponse,exposantUnite,resultatUnite,precisionReponse,justification FROM resultatseleves WHERE idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		while($res = $requete->fetch(PDO::FETCH_OBJ)){
			$listeReponses[] = new ReponseEleve($res);
		}

		$requete->closeCursor();

		if(isset($listeReponses)) {
			return $listeReponses;
		}
		return false;
	}

	public function getPrecisionReponse($reponseObj){
		$attenduObj = $this->getResultatAttendu($reponseObj);

		if($attenduObj->getResultatUnite() == $reponseObj->getResultatUnite()) {

			$resultatAttendu = $attenduObj->getResultat() * pow(10,$attenduObj->getExposantUnite());
			$resultatEleve = $reponseObj->getResultat() * pow(10,$reponseObj->getExposantUnite());

			if($reponseObj->getResultat() > $attenduObj->getResultat()){
				$precision = round($resultatAttendu * 100 / $resultatEleve,1);
			} else {
				$precision = round($resultatAttendu * 100 / $attenduObj->getResultat(),1);
			}
			
			//WARNING Mettre 0 sur le pourcentage est négatif ? cad l'élève s'est trompé de signe
			return $precision;
		} else {
			return 0;

		}
	}

	private function getResultatAttendu($reponseObj){
		$sql = 'SELECT resultat,exposantUnite,resultatUnite FROM resultatsattendus WHERE idSujet=:idSujet AND idReponse=:idReponse';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $reponseObj->getIdSujet());
		$requete->bindValue(':idReponse', $reponseObj->getIdReponse());
		$requete->execute();

		$res = $requete->fetch(PDO::FETCH_OBJ);

		$attenduObj = new Question($res);

		$requete->closeCursor();
		return $attenduObj;
	}
}
