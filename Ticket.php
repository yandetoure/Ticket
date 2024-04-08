<?php
require_once "config.php";
class Ticket   {
private $connexion ;
private $first_name;
private $last_name;
private $telephone;
private $email;
private $passport_number;
private $mode;
private $pays;
private $class;
private $departure_date;
private $return_date;
private $adress;
private $creation_date;
private $arrival_date;

public function  __construct($connexion, $first_name, $last_name, $email, $adress, $telephone, $pays, $mode, $class, $departure_date, $arrival_date, $creation_date, $passport_number, $return_date){
$this->connexion=$connexion;
$this->first_name = $first_name;
$this->last_name = $last_name;
$this->telephone = $telephone;
$this->email = $email;
$this->passport_number = $passport_number;
$this->mode = $mode;
$this->pays = $pays;
$this->class = $class;
$this->departure_date = $departure_date;
$this->adress = $adress;
$this->creation_date = $creation_date;
$this->arrival_date = $arrival_date;
$this->return_date = $return_date;

}
public function getFirst_name(){
    return $this->first_name;
}
public function getLast_name(){
    return $this->last_name;
}
public function getTelephone(){
    return $this->telephone;
}
public function getEmail(){
    return $this->email;
}
public function getPassport_number(){
    return $this->passport_number;
}
public function getMode(){
    return $this->mode;
}
public function getPays(){
    return $this->pays;
}
public function getClass(){
    return $this->class;
}
public function getDeparture_date(){
    return $this->departure_date;
}
public function getReturn_date(){
    return $this->return_date;
}
public function getAdress(){
    return $this->adress;
}
public function getCreation_date(){
    return $this->creation_date;
}
public function getArrival_date(){
    return $this->arrival_date;
}

public function addTicket($connexion,$first_name,$last_name, $email, $passport_number, $arrival_date, $adress,$telephone, $class, $mode, $pays, $creation_date, $departure_date, $return_date, ){
    try {
        $requete = $connexion->prepare("INSERT INTO ticket (first_name, last_name, email, passport_number, telephone, adress,  arrival_point,departure_date,return_date,class, mode, pays, creation_date) VALUES (:first_name, :last_name, :email, :passport_number, :arrival_point, :departure_date, :return_date, :class, :mode, :pays, :adress, :telephone ,:creation_date)");
        $requete->bindParam(':first_name', $first_name);
        $requete->bindParam(':last_name', $last_name);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':telephone', $telephone); 
        $requete->bindParam(':adress', $adress); 
        $requete->bindParam(':passport_number', $passport_number); 
        $requete->bindParam(':departure_date', $departure_date);
        $requete->bindParam(':return_date', $return_date);
        $requete->bindParam(':arrival_date', $arrival_date);
        $requete->bindParam(':id_mode', $mode);
        $requete->bindParam(':id_class', $class);
        $requete->bindParam(':id_pays', $pays);
        $requete->bindParam(':creation_date', $creation_date);

        $requete->execute();
        header('location :index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement du billet : " . $e->getMessage();
    }
}
public function deleteTicket($id){
    try {
        $sql = "DELETE FROM Ticket WHERE id= :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        header('location:index.php');
    } catch (PDOException $e) {
        die("erreur: impossible de faire la suppression" . $e->getMessage());
    }
    
}
public function readTicket(){
    try{
        $sql="SELECT * FROM Ticket ";
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