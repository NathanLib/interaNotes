<?php
class ImageManager{

  private $db;

  public function __construct($db){
		$this->db = $db;
	}

  public function ajouterImage($chemin){
    $sql = "INSERT INTO `images` (`chemin`) VALUES (:chemin);";

    $requete = $this->db->prepare($sql);
    $requete->bindValue(':chemin', $chemin);
    $requete->execute();
    $requete->closeCursor();
  }

}
