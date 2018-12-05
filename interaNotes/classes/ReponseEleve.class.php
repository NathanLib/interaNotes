<?php
class ReponseEleve{
	private $dateResult;
	private $idEleve;
	private $idSujet;
	private $idReponse;
	private $resultat;
	private $exposantUnite;
	private $resultatUnite;
	private $justification;
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
				case 'justification' :
					$this->setJustification($valeur);
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

	public function setIdEleve($idEleve){
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
		return $this->resultatUnite;
	}

	public function setResultatUnite($resultatUnite){
		$this->resultatUnite = $resultatUnite;
	}

	public function getJustification(){
		return $this->justification;
	}

	public function setJustification($justification){
		$this->justification = $justification;
	}

	public function getPrecisionReponse(){
		return $this->precisionReponse;
	}

	public function setPrecisionReponse($precisionReponse){
		$this->precisionReponse = $precisionReponse;
	}
}
