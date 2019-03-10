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

  public function getAllImage(){
    $sql = "SELECT idImage,chemin FROM images";

    $requete = $this->db->prepare($sql);
    $requete->execute();

    while($image = $requete->fetch(PDO::FETCH_OBJ)){
			$listeImage[] = $image;
		}
    $requete->closeCursor();

    return $listeImage;
  }

  public function supprimerImage($idImage){

    $sql = "UPDATE `points` SET `formuleMathematique` = '0' WHERE formuleMathematique=:idImage";
    $requete = $this->db->prepare($sql);
    $requete->bindValue(':idImage', $idImage);
    $requete->execute();
    $requete->closeCursor();

    $sql = "UPDATE `points` SET `symboleMathematique` = '0' WHERE symboleMathematique=:idImage";
    $requete = $this->db->prepare($sql);
    $requete->bindValue(':idImage', $idImage);
    $requete->execute();
    $requete->closeCursor();

    $sql = "DELETE FROM `images` WHERE `images`.`idImage` = :idImage;";

    $requete = $this->db->prepare($sql);
    $requete->bindValue(':idImage', $idImage);
    $requete->execute();
    $requete->closeCursor();
  }
}
