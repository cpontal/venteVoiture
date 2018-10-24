<?php
class Voiture {
  private $identifier;
  private $nom;
  private $couleur;
  private $prix;
  private $categorie;
  public function __construct($identifier=NULL,$nom=NULL,$couleur=NULL,$prix=NULL,$categorie=NULL){
    $this->identifier=$identifier;
    $this->nom=$nom;
    $this->couleur=$couleur;
    $this->prix=$prix;
    $this->categorie=$categorie;
  }
  public function getNom(){
    return $this->nom;
  }
  public function getCouleur(){
    return $this->couleur;
  }
  public function getPrix(){
    return $this->prix;
  }
  public function getCategorie(){
    return $this->categorie;
  }
}

class VoitureDAO {
  private $dataBase;

  public function __construct(){
    try {
      $this->dataBase= new PDO('sqlite:../bdd/voitureDB.db');
    } catch (PDOException $e) {
      die("erreur de connexion :".$e->getMessage());
    }

  }

  public function get (int $id):Voiture{
    $sql="SELECT * FROM voiture WHERE identifier=$id";
    $sth=$this->dataBase->query($sql);
    $result=$sth->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Voiture");
    return $result[0];
  }
}
    $garage = new VoitureDAO();
 ?>