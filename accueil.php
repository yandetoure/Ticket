<link rel="stylesheet" href="style.css">
<?php 
                include_once "config.php";
                include "header.php";
                $sql = "SELECT Ticket.*, Pays.name AS pays_name, Class.name AS class_name, Mode.name AS mode_name
                            FROM Ticket
                            JOIN Pays ON Ticket.id_pays = Pays.id JOIN Class ON Ticket.id_class = Class.id JOIN Mode ON Mode.id=Ticket.id_mode";
                   $stmt = $connexion->prepare($sql);
                   $stmt->execute();
                        // Afficher les membres dans des cartes Bootstrap
                    $row = $stmt->fetch(PDO::FETCH_ASSOC) ?>
        <div class="container">
            <style>
                li{
                    text-decoration: none;
                    font-size: 16px;
                    padding: 10px;
                }
            </style>
    <div class="plan">
        <h1>Plan a tour today</h1>
        <h2>DÉTAILS DU BILLET D'AVION</h2>
        <ul>

            <h4>Nom du passager : <?=$row['first_name']?> <?=$row['last_name']?></h4>
            <h4>Trajet du billet: : <?=$row['pays_name']?></h4>
            <h4>Email :<?=$row['email']?></h4>
            <h4>Numéro Telephone :<?=$row['telephone']?></h4>
            <h4>  Adresse du client : <?=$row['adress']?> </h4>
            <h4>Date de Départ : <?=$row['departure_date']?></h4>
            <h4>Trajet du billet: : <?=$row['pays_name']?></h4>
            <h4>Vous voyagé en classe : <?=$row['class_name']?></h4>
            <h4> Pour un billet   : <?=$row['mode_name']?></h4>
            </ul>
            <p>Veuillez vérifier toutes les informations avec attention. Bon voyage!</p>
            <button class="modifier"><a href="modifier.php?id=<?=$row['id']?>">Modifier</a></button>
            <button class="annuler"><a href="delete.php?id=<?=$row['id']?>">Annuler</a></button>
    </div>
<div class="img">
<img src="images/1.jpg" alt="">
</div>
    </div>
         <?php 
                    include "footer.php";
            ?>


