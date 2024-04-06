<?php

 require_once 'Billet.php';
 //Déclarations des variables pour la connexion
 $host ="localhost";
 $user="root";
 $pass= "";
 $db = "billet";

try{
    
    $connexion = new PDO("mysql:host=$host;dbname=$db",$user,$pass);

    //Déclaration des variables et instanciation de resultat
    $date_reservation ="";
    $prix ="";
    $heure="";
    $statut ="";
    $client ="";
    $trajet ="";

    $billet = new Billet ($connexion, $date_reservation, $prix,$heure,$statut,$client,$trajet);
    $resultat = $billet->read();

    
} catch (PDOException $e) {
    die("Erreur de la connexion à la base de données : ".$e->getMessage());
}