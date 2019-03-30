<?php
class Sujet {
	private $idSujet;
	private $idEnonce;
	private $idExamen;
	private $nbEssaiRealise;

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

				case 'idEnonce' :
				$this->setIdEnonce($valeur);
				break;

				case 'idExamen' :
				$this->setIdExamen($valeur);
				break;

				case 'nbEssaiRealise' :
				$this->setNbEssaiRealise($valeur);
				break;
			}
		}
	}

	public function getIdSujet(){
		return $this->idSujet;
	}

	public function setIdSujet($idSujet){
		if(is_numeric($idSujet)){
			$this->idSujet = $idSujet;
		}
	}

	public function getIdEnonce(){
		return $this->idEnonce;
	}

	public function setIdEnonce($idEnonce){
		$this->idEnonce = $idEnonce;
	}

	public function getIdExamenOfSujet(){
		return $this->idExamen;
	}

	public function setIdExamen($idExamen){
		if(is_numeric($idExamen)){
			$this->idExamen = $idExamen;
		}
	}

	public function getNbEssaiRealise(){
		return $this->nbEssaiRealise;
	}

	public function setNbEssaiRealise($nbEssaiRealise){
		$this->nbEssaiRealise = $nbEssaiRealise;
	}
}
