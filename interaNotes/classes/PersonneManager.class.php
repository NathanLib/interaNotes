<?php
class PersonneManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getNomPrenomParSujet($idSujet){

		$sql = 'SELECT nom, prenom FROM personne p
						INNER JOIN eleve e ON(p.idPersonne=e.idEleve)
						INNER JOIN exerciceattribue ex ON(e.idEleve=ex.idEleve)
						WHERE ex.idSujet=:idSujet ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$personne = $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();

		return new Personne($personne);
	}

	public function creerTableauEleves($eleves) {
		foreach ($eleves as $ligne => $value) {
			if($ligne!=0){

				$personne = explode(";", $value);

				$login = $personne[0].random_int(1,99);
				while($this->loginExiste($login)){
					$login = $personne[0].random_int(1,99);
				}

				$mdp = createRandomPassword();

				$listeEleves[] = new Personne(array('nom'=>$personne[0],'prenom'=>$personne[1],'mail'=>$personne[2],'login'=>$login,'mdp'=>$mdp));
			}
		}

		return $listeEleves;
	}

	public function insererTableauEleves($eleves,$annee,$nomPromo) {
		foreach ($eleves as $attribut => $value) {
			$sql = 'INSERT INTO personne(nom,prenom,mail,login,mdp) VALUES (:nom,:prenom,:mail,:login,:mdp) ';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':nom', $value->getNomPersonne());
			$requete->bindValue(':prenom', $value->getPrenomPersonne());
			$requete->bindValue(':login', $value->getLoginPersonne());
			$requete->bindValue(':mdp', createProtectedPassword($value->getPasswdPersonne()));
			$requete->bindValue(':mail', $value->getMailPersonne());
			$requete->execute();

			$id = $this->db->lastInsertId();

			$sql = 'INSERT INTO eleve(idEleve,annee,nomPromo) VALUES (:id,:annee,:nomPromo)';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':id', $id);
			$requete->bindValue(':annee', $annee);
			$requete->bindValue(':nomPromo',$nomPromo);
			$requete->execute();
			$requete->closeCursor();
		}
	}

	public function getTableauElevesPourCSV($listeEleves) {
		foreach ($listeEleves as $personne) {
		  $tableauEleves[] = array($personne->getNomPersonne(),$personne->getPrenomPersonne(),$personne->getMailPersonne(),$personne->getLoginPersonne(),$personne->getPasswdPersonne());
		}

		return $tableauEleves;
	}

	public function getAllEleveAnnee($annee){
		$sql = 'SELECT idPersonne,prenom,nom FROM personne p
						INNER JOIN eleve e ON(e.idEleve=p.idPersonne)
						WHERE e.annee=:annee';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':annee', $annee);
		$requete->execute();

		while($eleve = $requete->fetch(PDO::FETCH_OBJ)){
			$listeEleves[] = new Personne($eleve);
		}

		$requete->closeCursor();
		return $listeEleves;
	}

	public function loginExiste($login){
		$sql = 'SELECT login FROM personne WHERE login=:login';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':login', $login);
		$requete->execute();

		$res = $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();

		return is_null($res);

	}

	public function connexion($login,$protectedPassword){

		$sql = 'SELECT login,mdp FROM personne WHERE login=:login';
		$req = $this->db->prepare($sql);

		$req->bindValue(':login',$login,PDO::PARAM_STR);

		$req->execute();

		$res = $req->fetch(PDO::FETCH_ASSOC);

		if($res['login'] === $login && $res['mdp'] === $protectedPassword ) {
			if($this->isEleve($login)){
				return "eleve";
			}
			return "enseignant";
		}

		return "erreurConnexion";

	}

	private function isEleve($login){

		$sql = 'SELECT idEleve FROM eleve e INNER JOIN personne p ON(p.idPersonne=e.idEleve) WHERE p.login=:login';
		$req = $this->db->prepare($sql);

		$req->bindValue(':login',$login,PDO::PARAM_STR);
		$req->execute();
		$res = $req->fetch(PDO::FETCH_OBJ);

		$req->closeCursor();

		return $res != null;

	}
}
