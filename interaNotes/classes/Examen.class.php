<?php
class Examen{
	private $idExamen;
	private $idEnseignant;
	private $dateDepot;
	private $anneeScolaire;
	private $titreExamen;
	private $consigneExamen;
	private $nbEssaiPossible;
	private $semestre;

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

				case 'idEnseignant' :
				$this->setIdEnseignant($valeur);
				break;

				case 'dateDepot' :
				$this->setDateDepotExamen($valeur);
				break;

				case 'anneeScolaire' :
				$this->setAnneeScolaireExamen($valeur);
				break;

				case 'titreExamen' :
				$this->setTitreExamen($valeur);
				break;

				case 'consigneExamen' :
				$this->setConsigneExamen($valeur);
				break;

				case 'nbEssaiPossible' :
				$this->setNbEssaiPossible($valeur);
				break;

				case 'semestre' :
				$this->setSemestreExamen($valeur);
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

	public function getIdEnseignant(){
		return $this->idExamen;
	}

	public function setIdEnseignant($idEnseignant){
		if(is_numeric($idEnseignant)){
			$this->idEnseignant = $idEnseignant;
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

	public function getTitreExamen(){
		return $this->titreExamen;
	}

	public function setTitreExamen($titreExamen){
		$this->titreExamen = $titreExamen;
	}

	public function getConsigneExamen(){
		return $this->consigneExamen;
	}

	public function setConsigneExamen($consigneExamen){
		$this->consigneExamen = $consigneExamen;
	}

	public function getNbEssaiPossible(){
		return $this->nbEssaiPossible;
	}

	public function setNbEssaiPossible($nbEssaiPossible){
		$this->nbEssaiPossible = $nbEssaiPossible;
	}

	public function getSemestreExamen(){
		return $this->semestre;
	}

	public function setSemestreExamen($semestre){
		$this->semestre = $semestre;
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
