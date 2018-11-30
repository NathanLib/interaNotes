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

	public function creerEleves($eleves,$annee) {
		foreach ($eleves as $attribut => $value) {
			if($attribut!=0){
				
				$personne=explode(";", $value);


				$login = $personne[0].random_int(0,99);

				while($this->loginExiste($login)){
					$login = $personne[0].random_int(0,99);
				}

				$mdp="IUT";

				$listeEleves[] = new Personne(array('nom'=>$personne[0],'prenom'=>$personne[1],'login'=>$login,'mdp'=>$mdp)); //FAIRE TABLEAU ELEVE
				
			}
		}

		$this->importEleves($listeEleves,$annee);
		//$this->getCSVEleves($listeEleves); // WARNING
	}

	public function importEleves($eleves,$annee) {
		foreach ($eleves as $attribut => $value) {
			$sql = 'INSERT INTO personne(nom,prenom,login,mdp) VALUES (:nom,:prenom,:login,:mdp) ';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':nom', $value->getNomPersonne());
			$requete->bindValue(':prenom', $value->getPrenomPersonne());
			$requete->bindValue(':login', $value->getLoginPersonne());
			$requete->bindValue(':mdp', $value->getPasswdPersonne());
			//$requete->bindValue(':email', $email);
			$requete->execute();

			$id = $this->db->lastInsertId();

			$sql = 'INSERT INTO eleve(idEleve,annee) VALUES (:id,:annee)';

			$requete = $this->db->prepare($sql);
			$requete->bindValue(':id', $id);
			$requete->bindValue(':annee', $annee);

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

	//WARNING

	public function getCSVEleves($eleves) {
		// output headers so that the file is downloaded rather than displayed
		header('Content-type: text/csv');
		header('Content-Disposition: attachment; filename="demo.csv"');

    // do not cache the file
		header('Pragma: no-cache');
		header('Expires: 0');
    // create a file pointer connected to the output stream

		$csv = fopen('php://output', 'w');

    // send the column headers
		fputcsv($csv, array('Nom', 'Prenom', 'Login', 'Mot de passe'));

		foreach ($eleves as $attribut => $value) {
			$data[]=$value->getNomPersonne().";".$value->getPrenomPersonne().";".$value->getLoginPersonne().";".$value->getPasswdPersonne();
		}

			fputcsv($csv, $data);
	}

	public function connexion($login,$mdp){
		
		//$mdp = (sha1(sha1($mdp->getPerPwd()).SALT));
		
		$req = $this->db->prepare('SELECT login,mdp FROM personne WHERE login=:login;');
		
		$req->bindValue(':login',$login,PDO::PARAM_STR);
		
		$req->execute();
		
		$res = $req->fetch(PDO::FETCH_ASSOC);	
			
		if($res['login'] === $login && $res['mdp'] === $mdp ) {
			if($this->isEleve($login)){
				return 1;
			}
			return 2;
		}
		
		return 0;

	}

	public function isEleve($login){

		$req = $this->db->prepare('SELECT idEleve FROM eleve e JOIN personne p WHERE p.idPersonne=e.idEleve AND p.login=:login;');
		
		$req->bindValue(':login',$login,PDO::PARAM_STR);
		
		$req->execute();
		
		$res = $req->fetch(PDO::FETCH_OBJ);
		
		$req->closeCursor();

		if($res!=false){
			return true;
		}
		return $res;
	
	}
}
