<?php
class ImageManager{

  private $db;

  public function __construct($db){
		$this->db = $db;
	}

  public function ajouterImage($cheminImage){
    $sql = "INSERT INTO images (cheminImage) VALUES (:cheminImage);";

    $requete = $this->db->prepare($sql);
    $requete->bindValue(':cheminImage', $cheminImage);
    $resultat = $requete->execute();
    $requete->closeCursor();

    return $resultat;
  }

  public function getAllImages(){
    $sql = "SELECT idImage, cheminImage FROM images";

    $requete = $this->db->prepare($sql);
    $requete->execute();

    while($image = $requete->fetch(PDO::FETCH_OBJ)){
			$listeImage[] = $image;
		}
    $requete->closeCursor();

    return $listeImage;
  }

}
