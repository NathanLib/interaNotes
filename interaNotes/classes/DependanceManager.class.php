<?php
class DependanceManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllDependances(){

		$sql = 'SELECT idValeur, idValeurDependante FROM dependances';

		$requete = $this->db->prepare($sql);
		$requete->execute();

    $dependance = $requete->fetchAll(PDO::FETCH_KEY_PAIR);

		$requete->closeCursor();
		return $dependance;
	}
}
