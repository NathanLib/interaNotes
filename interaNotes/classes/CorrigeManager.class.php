<?php
class CorrigeManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getSujetValeur($idSujet){

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

		$nbConso = $valeursSujet[4]['valeur']*1000000 / $valeursSujet[5]['valeur']*10; // nombre de consommation (1000km) = [[distanceDestination]]/ [[nbMoteur]] (vient de l'unité de consommation carburant)

		$qteCarburant = $nbConso*100*$valeursSujet[0]['valeur']; //qtéCarburant tous moteurs = nbConso*100*[[nbMoteur]]

		$jours = $valeursSujet[4]['valeur'] / $valeursSujet[1]['valeur']; // jours = [[distanceDestination]]/[[vitesse]]

		$qteO2 =$valeursSujet[2]['valeur']*$valeursSujet[8]['valeur']*$jours; // [[nbPersonnes]]*60*jours

		$qtenourriture = $valeursSujet[2]['valeur']*$valeursSujet[7]['valeur']*$jours; //[[nbPersonne]]*2kg*jours

		$qteeau = $valeursSujet[2]['valeur']*$valeursSujet[6]['valeur']*$jours; //[[nbPersonne]]*1.5*jours

		return array('qteCarburant' => $qteCarburant." T", 'jours' => $jours." jours", 'qteO2' => $qteO2." L", 'qtenourriture' => $qtenourriture." Kg", 'qteeau' => $qteeau." L" );
	}
}

//RENTRER AVEC UNITE DE BASE PUIS PRPOSER CONVERTIR puis rentrer dans la BD