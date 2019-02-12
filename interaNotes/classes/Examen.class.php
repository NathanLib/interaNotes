<?php
class Examen{
	private $idExamen;
	private $dateDepot;
  private $anneeScolaire;

	public function __construct($valeurs){
		if(!empty($valeurs)){
			$this->affecte($valeurs);
		}
	}

	public function affecte($valeurs){
		foreach($valeurs as $attribut => $valeur){

			switch($attribut){
				case 'idExamen' :
					$this->setIdExamen($valeur);
					break;

				case 'dateDepot' :
					$this->setDateDepotExamen($valeur);
					break;

        case 'anneeScolaire' :
					$this->setAnneeScolaireExamen($valeur);
					break;
			}
		}
	}

	public function getIdExamen(){
		return $this->idExamen;
	}

	public function setIdExamen($id){
		if(is_numeric($id)){
			$this->idExamen = $id;
		}
	}

	public function getDateDepotExamen(){
		return $this->dateDepot;
	}

	public function setDateDepotExamen($date){
		$this->dateDepot = $date;
	}

  public function getAnneeScolaireExamen(){
		return $this->anneeScolaire;
	}

	public function setAnneeScolaireExamen($anneeScolaire){
    if(is_numeric($anneeScolaire)){
			$this->anneeScolaire = $anneeScolaire;
		}
	}

	public function getStatut($estAttribue){
		if($this->estFini()){
			return StatutExamen::TERMINE;

		}elseif(!$estAttribue){
			return StatutExamen::NON_DISTRIBUE;

		}else{
			return StatutExamen::EN_COURS;
		}
	}

	public function estFini(){
		$dateFin = new DateTime($this->dateDepot);
		$dateDuJour = new DateTime();
		return $dateDuJour >= $dateFin;
	}

}
