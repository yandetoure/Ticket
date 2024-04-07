<?php
require_once "config.php";
class Billet   {
private $date_reservation ;
private $prix ;
private $heure;
private $statut ;
private $client ;
private $trajet ;
private $connexion ;
public function  __construct($connexion ,$date_reservation,$prix,$heure,$statut,$client,$trajet){
$this->connexion=$connexion;
$this->date_reservation=$date_reservation;
$this->prix=$prix;
$this->heure=$heure;
$this->statut=$statut;
$this->client=$client;
$this->trajet=$trajet;
}
public function getDate(){
    return $this->date_reservation;
}
public function getPrix(){
    return $this->prix;
}
public function getHeure(){
    return $this->heure;
}
public function getStatut(){
    return $this->statut;
}
public function getClient(){
    return $this->client;
}
public function getTrajet(){
    return $this->trajet;
}
public function ajouter(){

    
}
public function supprimer($id){
    try {
        $sql = "DELETE FROM billets WHERE id= :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        header('location:index.php');
    } catch (PDOException $e) {
        die("erreur: impossible de faire la suppression" . $e->getMessage());
    }
    
}
public function read(){
    try{
        $sql="SELECT * FROM billets ";
        $stmt=$this->connexion->prepare($sql);
    $stmt->execute();
    //Récupération des données
    $resultat=$stmt->fetchALL(PDO::FETCH_ASSOC);
    return $resultat;
}
catch(PDOException $e){
    echo "Erreur: " . $e->getMessage();
}
}
}