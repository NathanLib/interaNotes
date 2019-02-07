<?php
class ReponseEleveManager{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function importSaisie($reponseObj){
		$sql = 'INSERT INTO resultatseleves(dateResult,idEleve,idSujet,idQuestion,resultat,exposantUnite,resultatUnite,justification,precisionReponse,resultatExposant) VALUES (:dateResult,:idEleve,:idSujet,:idQuestion,:resultat,:exposantUnite,:resultatUnite,:justification,:precisionReponse,:resultatExposant) ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':dateResult', $reponseObj->getDateResult());
		$requete->bindValue(':idEleve', $reponseObj->getIdEleve());
		$requete->bindValue(':idSujet', $reponseObj->getIdSujet());
		$requete->bindValue(':idQuestion',$reponseObj->getIdQuestion());
		$requete->bindValue(':resultat', $reponseObj->getResultat());
		$requete->bindValue(':exposantUnite', $reponseObj->getExposantUnite());
		$requete->bindValue(':resultatUnite', $reponseObj->getResultatUnite());
		$requete->bindValue(':justification', $reponseObj->getJustification());
		$requete->bindValue(':precisionReponse', $reponseObj->getPrecisionReponse());
		$requete->bindValue(':resultatExposant', $reponseObj->getResultatExposant());
		$requete->execute();
	}

	public function getAllReponseEleve($idSujet){
		$sql = 'SELECT dateResult,resultat,idQuestion,exposantUnite,resultatUnite,precisionReponse,justification,resultatExposant FROM resultatseleves WHERE idSujet=:idSujet';

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

	public function calculerPrecisionReponse($reponseObj){
		$attenduObj = $this->getResultatAttendu($reponseObj);

		if($attenduObj->getResultatUnite() == $reponseObj->getResultatUnite()) {

			$resultatAttendu = $attenduObj->getResultat() * pow(10,$attenduObj->getExposantUnite());
			$resultatEleve = $reponseObj->getResultat() * pow(10,$reponseObj->getExposantUnite());

			$precision = ($resultatEleve-$resultatAttendu) / $resultatAttendu * 100;
			$precision = abs(100 - abs($precision));

			//WARNING Mettre 0 sur le pourcentage est négatif ? cad l'élève s'est trompé de signe
			return $precision;
		} else {
			return 0;

		}
	}

	private function getResultatAttendu($reponseObj){
		$sql = 'SELECT resultat,exposantUnite,resultatUnite FROM resultatsattendus WHERE idSujet=:idSujet AND idQuestion=:idQuestion';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $reponseObj->getIdSujet());
		$requete->bindValue(':idQuestion', $reponseObj->getIdQuestion());
		$requete->execute();

		$res = $requete->fetch(PDO::FETCH_OBJ);

		$attenduObj = new Question($res);

		$requete->closeCursor();
		return $attenduObj;
	}

	public function getReponseEleveByIdQuestion($idQuestion, $idSujet){

		$sql = 'SELECT dateResult,resultat,idQuestion,exposantUnite,resultatUnite,precisionReponse,justification,resultatExposant FROM resultatseleves WHERE idQuestion=:idQuestion AND idSujet=:idSujet';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idQuestion', $idQuestion);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$res = $requete->fetch(PDO::FETCH_OBJ);
		$reponse = new ReponseEleve($res);

		if(isset($reponse)){
			return $reponse;
		}
		return false;
	}
	public function getDernièreReponsesEleve($idSujet){
		/*ATTENTION FAIRE PASSER EN PARAMETRE LE NOMBRE DE QUESTIONS*/

		$sql = 'SELECT dateResult,resultat,idQuestion,exposantUnite,resultatUnite,precisionReponse,justification,resultatExposant FROM resultatseleves WHERE idSujet=:idSujet ORDER BY dateResult DESC LIMIT 5';

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
}
