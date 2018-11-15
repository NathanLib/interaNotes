<?php
class Valeur{
	private $idValeur;
	private $idPoint;
  private $valeur;

	public function __construct($valeurs){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($valeurs){
		foreach($valeurs as $attribut => $valeur){

			switch($attribut){
				case 'idValeur' :
					$this->setIdValeur($valeur);
					break;

				case 'idPoint' :
					$this->setIdPointOfValeur($valeur);
					break;

        case 'valeur' :
					$this->setValeur($valeur);
					break;
			}
		}
	}

	public function getIdValeur(){
		return $this->idValeur;
	}

	public function setIdValeur($idValeur){
		if(is_numeric($idValeur)){
			$this->idValeur = $idValeur;
		}
	}

	public function getIdPointOfValeur(){
		return $this->idPoint;
	}

	public function setIdPointOfValeur($idPoint){
    if(is_numeric($idPoint)){
		    $this->idPoint = $idPoint;
    }
	}

  public function getValeur(){
		return $this->valeur;
	}

	public function setValeur($valeur){
    if(is_numeric($valeur)){
			$this->valeur = $valeur;
		}
	}

}
