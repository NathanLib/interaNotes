<?php
class QuestionManager{

  private $db;

  public function __construct($db){
		$this->db = $db;
	}

  public function getAllQuestion($idSujet){
    $sql = 'SELECT idReponse,intituleQuestion,bareme FROM resultatsattendus WHERE idSujet=:idSujet';

    $requete = $this->db->prepare($sql);
    $requete->bindValue(':idSujet', $idSujet);
    $requete->execute();

    while($question = $requete->fetch(PDO::FETCH_OBJ)){
      $listeQuestions[] = new Question($question);
    }

    $requete->closeCursor();
    return $listeQuestions;
  }

}
