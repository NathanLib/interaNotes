<?php
class Point{
	private $idPoint;
	private $idExamen;
  private $nomPoint;
	private $estDonneesCatia;
	private $idImage;

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

				case 'estDonneesCatia' :
						$this->setEstDonneesCatia($valeur);
						break;

				case 'idImage' :
		  			$this->setIdImage($valeur);
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

  public function getNomPoint(){
		return $this->nomPoint;
	}

	public function setNomPoint($nomPoint){
		$this->nomPoint = $nomPoint;
	}

	public function getEstDonneesCatia(){
		return $this->estDonneesCatia;
	}

	public function setEstDonneesCatia($estDonneesCatia){
		$this->estDonneesCatia = $estDonneesCatia;
	}

	public function getIdImage(){
		return $this->idImage;
	}

	public function setIdImage($idImage){
		$this->idImage = $idImage;
	}

}
