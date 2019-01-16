<?php
class CorrigeManager {
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	private function getSujetValeur($idSujet){

		$sql = 'SELECT T.idSujet, T.idValeur, v.valeur, v.exposantValeur FROM (
						SELECT idSujet, idValeur FROM exercicegenere
						WHERE idSujet=:idSujet)T
						INNER JOIN valeurs v ON (T.idValeur = v.idValeur)';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		while($valeur = $requete->fetch(PDO::FETCH_ASSOC)){
			$valeursSujet[] = $valeur;
		}

		$requete->closeCursor();

		return $valeursSujet;
	}

	public function calculerCorrection($idSujet){ 
		
		$tableauPoint = $this->getSujetValeur($idSujet); //NE PAS TOUCHER

		//REDEFINIR VARIABLES PLUS CLAIREMENT
		
		$nbMoteur = $tableauPoint[0]['valeur']*pow(10, $tableauPoint[0]['exposantValeur']);

		$vitesse = $tableauPoint[1]['valeur']*pow(10, $tableauPoint[1]['exposantValeur']);

		$nbPersonne = $tableauPoint[2]['valeur']*pow(10, $tableauPoint[2]['exposantValeur']);

		$distanceDestination = $tableauPoint[4]['valeur']*pow(10, $tableauPoint[4]['exposantValeur']);

		$consommationCarburantDistance = $tableauPoint[5]['valeur']*pow(10, $tableauPoint[5]['exposantValeur']); 

		$consommationCarburantQuantité = $tableauPoint[5]['valeur']*pow(10, $tableauPoint[5]['exposantValeur'])*10; //ALERTE

		$consoEau = $tableauPoint[6]['valeur']*pow(10, $tableauPoint[6]['exposantValeur']);		

		$consoNourriture = $tableauPoint[7]['valeur']*pow(10, $tableauPoint[7]['exposantValeur']);

		$consoO2 = $tableauPoint[8]['valeur']*pow(10, $tableauPoint[8]['exposantValeur']);
		
		//OPERATIONS

		$nbConso = $distanceDestination / $consommationCarburantDistance; // nombre de consommation (1000km) = [[distanceDestination]]/ [[nbMoteur]] (vient de l'unité de consommation carburant)

		$qteCarburant = $nbConso*$consommationCarburantQuantité*$nbMoteur; //qtéCarburant tous moteurs = nbConso*consommationMoteur*[[nbMoteur]]

		$jours = (($distanceDestination/1000) / $vitesse)/24; // jours = ([[distanceDestination]]/[[vitesse]])/24 (nb heures)
		$jours = ceil($jours);

		$qteO2 =$nbPersonne*$consoO2*$jours; // [[nbPersonnes]]*60*jours

		$qteNourriture = $nbPersonne*$consoNourriture*$jours; //[[nbPersonne]]*2kg*jours

		$qteEau = $nbPersonne*$consoEau*$jours; //[[nbPersonne]]*1.5*jours

		return array('qteCarburant' => $qteCarburant." g", 'jours' => $jours." jours", 'qteO2' => $qteO2." L", 'qtenourriture' => $qteNourriture." g", 'qteeau' => $qteEau." L" );
	}

	
}
