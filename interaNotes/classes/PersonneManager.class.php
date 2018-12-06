<?php
class PersonneManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getNomPrenomParSujet($idSujet){

		$sql = 'SELECT nom, prenom FROM personne p JOIN exerciceattribue ex JOIN eleve e ON p.idPersonne=e.idEleve AND e.idEleve=ex.idEleve AND ex.idSujet=:idSujet ';

		$requete = $this->db->prepare($sql);
		$requete->bindValue(':idSujet', $idSujet);
		$requete->execute();

		$personne = $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();

		return new Personne($personne);
	}

	public function creerEleves($eleves,$annee,$nomPromo) {
		foreach ($eleves as $attribut => $value) {
			if($attribut!=0){

				$personne = explode(";", $value);
				$login = $personne[0].random_int(1,99);

				while($this->loginExiste($login)){
					$login = $personne[0].random_int(1,99);
				}

				$mdp = createRandomPassword();

				$listeEleves[] = new Personne(array('nom'=>$personne[0],'prenom'=>$personne[1],'mail'=>$personne[2],'login'=>$login,'mdp'=>$mdp));
			}
		}

		$this->importEleves($listeEleves,$annee,$nomPromo);
		$this->getCSVEleves($listeEleves); // WARNING
	}

	private function importEleves($eleves,$annee,$nomPromo) {
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

	public function getAllEleveAnnee($annee){
		$sql = 'SELECT idPersonne,prenom,nom FROM personne p JOIN eleve e WHERE e.idEleve=p.idPersonne AND e.annee=:annee';

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

	private function getCSVEleves($listeEleves) {
		foreach ($listeEleves as $personne) {
		  $tableauEleves[] = array($personne->getNomPersonne(),$personne->getPrenomPersonne(),$personne->getMailPersonne(),$personne->getLoginPersonne(),$personne->getPasswdPersonne());
		}

		$_SESSION['tableauEleves'] = $tableauEleves;
		//header('Location: include/pages/test_exportCSV.inc.php');
		echo "<script
		language='javascript'>blank.location.href='include/pages/test_exportCSV.inc.php'</script>";
	}

	public function connexion($login,$protectedPassword){

		$req = $this->db->prepare('SELECT login,mdp FROM personne WHERE login=:login;');

		$req->bindValue(':login',$login,PDO::PARAM_STR);

		$req->execute();

		$res = $req->fetch(PDO::FETCH_ASSOC);

		if($res['login'] === $login && $res['mdp'] === $protectedPassword ) {
			if($this->isEnseignant($login)){
				return "enseignant";
			}
			return "eleve";
		}

		return "erreurConnexion";

	}

	public function isEnseignant($login){

		$req = $this->db->prepare('SELECT idenseignant FROM enseignant e JOIN personne p WHERE p.idPersonne=e.idEnseignant AND p.login=:login;');

		$req->bindValue(':login',$login,PDO::PARAM_STR);

		$req->execute();

		$res = $req->fetch(PDO::FETCH_OBJ);

		$req->closeCursor();

		if($res!=false){
			return true;
		}
		return $res;

	}

	public function getIdEleveByLogin($login){
		$req = $this->db->prepare('SELECT idEleve FROM eleve e JOIN personne p WHERE p.idPersonne=e.idEleve AND p.login=:login;');

		$req->bindValue(':login',$login,PDO::PARAM_STR);

		$req->execute();

		$res = $req->fetch(PDO::FETCH_OBJ);

		$req->closeCursor();

		return $res->idEleve;
	}
}
