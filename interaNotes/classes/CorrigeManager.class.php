<?php
class CorrigeManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	private function getSujetValeur($idSujet){

		$sql = 'SELECT T.idSujet, T.idValeur, v.valeur FROM(
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
		
		$valeursSujet = $this->getSujetValeur($idSujet);

		//cLARIFICATION DES VALEURS

		$nbMoteur = $valeursSujet[0]['valeur'];

		$vitesse = $valeursSujet[1]['valeur'];

		$nbPersonne = $valeursSujet[2]['valeur'];

		$distanceDestination = $valeursSujet[4]['valeur']*1000000; //pb conversion WARNING

		$consommationCarburantDistance = $valeursSujet[5]['valeur']*10; //pb conversion WARNING

		$consommationCarburantQuantité = $valeursSujet[5]['valeur'];

		$consoEau = $valeursSujet[6]['valeur'];		

		$consoNourriture = $valeursSujet[7]['valeur'];

		$consoO2 = $valeursSujet[8]['valeur'];

		//opérations

		$nbConso = $distanceDestination / $consommationCarburantDistance; // nombre de consommation (1000km) = [[distanceDestination]]/ [[nbMoteur]] (vient de l'unité de consommation carburant)

		$qteCarburant = $nbConso*$consommationCarburantQuantité*$nbMoteur; //qtéCarburant tous moteurs = nbConso*consommationMoteur*[[nbMoteur]]

		$jours = $distanceDestination / $vitesse; // jours = [[distanceDestination]]/[[vitesse]]

		$qteO2 =$nbPersonne*$consoO2*$jours; // [[nbPersonnes]]*60*jours

		$qteNourriture = $nbPersonne*$consoNourriture*$jours; //[[nbPersonne]]*2kg*jours

		$qteEau = $nbPersonne*$consoEau*$jours; //[[nbPersonne]]*1.5*jours

		return array('qteCarburant' => $qteCarburant." T", 'jours' => $jours." jours", 'qteO2' => $qteO2." L", 'qtenourriture' => $qteNourriture." Kg", 'qteeau' => $qteEau." L" );
	}
}

//RENTRER AVEC UNITE DE BASE PUIS PRPOSER CONVERTIR puis rentrer dans la BD
