<?php
class Question{
	private $idSujet;
	private $idQuestion;
	private $intituleQuestion;
	private $resultat;
	private $resultatUnite;
	private $baremeQuestions;
	private $exposantUnite;
	private $exposantResultat;
	private $zoneTolerance;

	public function __construct($valeurs){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($valeurs){
		foreach($valeurs as $attribut => $valeur){

			switch($attribut){
				case 'idSujet' :
					$this->setIdSujet($valeur);
					break;

				case 'idQuestion' :
					$this->setIdQuestion($valeur);
					break;

				case 'intituleQuestion' :
					$this->setIntituleQuestion($valeur);
					break;
				case 'resultat' :
					$this->setResultat($valeur);
					break;
				case 'resultatUnite' :
					$this->setResultatUnite($valeur);
					break;
				case 'baremeQuestion' :
					$this->setBaremeQuestion($valeur);
					break;
				case 'exposantUnite' :
					$this->setExposantUnite($valeur);
					break;
				case 'resultatExposant' :
					$this->setExposantResultat($valeur);
					break;
				case 'zoneTolerance' :
					$this->setZoneTolerance($valeur);
					break;
			}
		}
	}

	public function getIdSujet(){
		return $this->idSujet;
	}

	public function setIdSujet($idSujet){
		if(is_numeric($id)){
			$this->idSujet = $idSujet;
		}
	}

	public function getIdQuestion(){
		return $this->idQuestion;
	}

	public function setIdQuestion($idQuestion){
		$this->idQuestion = $idQuestion;
	}

	public function getIntituleQuestion(){
		return $this->intituleQuestion;
	}

	public function setIntituleQuestion($intituleQuestion){
		$this->intituleQuestion = $intituleQuestion;
	}

	public function getResultat(){
		return $this->resultat;
	}

	public function setResultat($resultat){
		$this->resultat = $resultat;
	}

	public function getResultatUnite(){
		return $this->resultatUnite;
	}

	public function setResultatUnite($uniteResultat){
		$this->resultatUnite = $uniteResultat;
	}

	public function getBaremeQuestion(){
		return $this->baremeQuestion;
	}

	public function setBaremeQuestion($bareme){
		$this->baremeQuestion = $bareme;
	}

	public function getExposantUnite(){
		return $this->exposantUnite;
	}

	public function setExposantUnite($exposantUnite){
		$this->exposantUnite = $exposantUnite;
	}

	public function getExposantResultat(){
		return $this->exposantResultat;
	}

	public function setExposantResultat($exposantResultat){
		$this->exposantResultat = $exposantResultat;
	}

	public function getZoneTolerance(){
		return $this->zoneTolerance;
	}

	public function setZoneTolerance($zoneTolerance){
		$this->zoneTolerance = $zoneTolerance;
	}
}
