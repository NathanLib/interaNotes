<?php
class ReponseEleve{
	private $dateResult;
	private $idEleve;
	private $idSujet;
	private $idReponse;
	private $resultat;
	private $exposantUnite;
	private $resultatUnite;
	private $justificationReponse;
	private $precisionReponse;

	public function __construct($valeurs){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($valeurs){
		foreach($valeurs as $attribut => $valeur){

			switch($attribut){
				case 'dateResult' :
					$this->setDateResult($valeur);
					break;

				case 'idEleve' :
					$this->setIdEleve($valeur);
					break;

				case 'idSujet' :
					$this->setIdSujet($valeur);
					break;
				case 'resultat' :
					$this->setResultat($valeur);
					break;
				case 'exposantUnite' :
					$this->setExposantUnite($valeur);
					break;
				case 'resultatUnite' :
					$this->setResultatUnite($valeur);
					break;
				case 'justificationReponse' :
					$this->setJustificationReponse($valeur);
					break;
				case 'precisionReponse' :
					$this->setPrecisionReponse($valeur);
					break;
			}
		}
	}

	public function getDateResult(){
		return $this->dateResult;
	}

	public function setDateResult($dateResult){
		$this->dateResult = $dateResult;
	}

	public function getIdEleve(){
		return $this->idEleve;
	}

	public function setIdEleve($idReponse){
		$this->idEleve = $idEleve;
	}

	public function getIdSujet(){
		return $this->idSujet;
	}

	public function setIdSujet($idSujet){
		$this->idSujet = $idSujet;
	}

	public function getIdReponse(){
		return $this->idReponse;
	}

	public function setIdReponse($idReponse){
		$this->idReponse = $idReponse;
	}

	public function getResultat(){
		return $this->resultat;
	}

	public function setResultat($resultat){
		$this->resultat = $resultat;
	}

	public function getExposantUnite(){
		return $this->exposantUnite;
	}

	public function setExposantUnite($exposantUnite){
		$this->exposantUnite = $exposantUnite;
	}

	public function getResultatUnite(){
		return $this->ResultatUnite;
	}

	public function setResultatUnite($resultatUnite){
		$this->resultatUnite = $resultatUnite;
	}

	public function getJustificationReponse(){
		return $this->justificationReponse;
	}

	public function setJustificationReponse($justificationReponse){
		$this->justificationReponse = $justificationReponse;
	}

	public function getPrecisionReponse(){
		return $this->precisionReponse;
	}

	public function setPrecisionReponse($precisionReponse){
		$this->precisionReponse = $precisionReponse;
	}
}
