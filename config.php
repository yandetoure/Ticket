<?php
require_once ('Ticket.php');



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ticket";

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);

    // Configuration pour afficher les erreurs PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Déclaration des variables et instanciation de resultat
    $first_name ="";
    $last_name ="";
    $telephone ="0"; // Variable corrigée de telepgone à telephone
    $adress ="";
    $pays ="";
    $class ="";
    $mode ="";
    $user ="";
    $passport_number ="N12";
    $departure_date = "";
    $return_date = 0;
    $creation_date = 0;
    $arrival_date ="";
    $email = ""; // Ajout de l'email


    // Création d'un objet Ticket en utilisant la connexion
    $ticket = new Ticket($connexion, $first_name, $last_name, $email, $adress, $telephone, $pays, $mode, $class, $departure_date, $arrival_date, $creation_date, $passport_number, $return_date);
    $resultat = $ticket->readTicket();

} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

$requete = "SELECT id, name FROM Pays";
$resultat = $connexion->query($requete);
// Fermeture de la connexion à la base de données (décommentez si nécessaire)
// $connexion = null;

?>
