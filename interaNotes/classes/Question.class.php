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

				case 'idReponse' :
					$this->setIdReponse($valeur);
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

	public function getIdReponse(){
		return $this->idReponse;
	}

	public function setIdReponse($idReponse){
		$this->idReponse = $idReponse;
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
		return $this->bareme;
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
}
