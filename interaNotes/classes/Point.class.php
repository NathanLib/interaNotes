<?php
class Point{
	private $idPoint;
	private $idExamen;
  private $nomPoint;
  private $unitePoint;

	public function __construct($valeurs){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($valeurs){
		foreach($valeurs as $attribut => $valeur){

			switch($attribut){
				case 'idPoint' :
					$this->setIdPoint($valeur);
					break;

				case 'idExamen' :
					$this->setIdExamenPoint($valeur);
					break;

        case 'nomPoint' :
					$this->setNomPoint($valeur);
					break;

        case 'unitePoint' :
					$this->setUnitePoint($valeur);
					break;
			}
		}
	}

	public function getIdPoint(){
		return $this->idPoint;
	}

	public function setIdPoint($id){
		if(is_numeric($id)){
			$this->idPoint = $id;
		}
	}

	public function getIdExamenPoint(){
		return $this->idExamen;
	}

	public function setIdExamenPoint($idExamen){
		$this->idExamen = $idExamen;
	}

  public function setNomPoint(){
		return $this->nomPoint;
	}

	public function setNomPoint($nomPoint){
		$this->nomPoint = $nomPoint;
	}

  public function setUnitePoint(){
		return $this->unitePoint;
	}

	public function setUnitePoint($unitePoint){
		$this->unitePoint = $unitePoint;
	}

}
