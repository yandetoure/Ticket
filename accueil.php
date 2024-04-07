<link rel="stylesheet" href="style.css">
<?php 
                include_once "config.php";
                include "header.php";
                $sql = "SELECT *,billets.id AS billets FROM billets JOIN client ON billets.client_id=client.id WHERE billets.id = :id";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
                $stmt->execute();
                        // Afficher les membres dans des cartes Bootstrap
                    $row = $stmt->fetch(PDO::FETCH_ASSOC) ?>
        <div class="container">
    <div class="plan">
        <h1>Plan a tour today</h1>
        <h2>Just How you want</h2>
        <ul>
            <li> BILLET D'AVION</li>
            <li>Nom du passager : <?=$row['prenom']?> <?=$row['nom']?></li>
            <li>Numéro Telephone :<?=$row['numero_tel']?></li>
            <li>Date de reservation : <?=$row['date_reservation']?></li>
            <li>Trajet : : <?=$row['trajet']?></li>
            <li>Prix du biellet  : <?=$row['prix']?></li>
            <li>Heure de reservation : <?=$row['heure']?></li>
            <li>Statut : <?=$row['statut']?></li>
            </ul>
            <p>Veuillez vérifier toutes les informations avec attention. Bon voyage!</p>
            <button class="modifier"><a href="modifier.php?id=<?=$row['id']?>">Modifier</a></button>
            <button class="annuler"><a href="supprimer.php?id=<?=$row['billets']?>">Annuler</a></button>
    </div>
<div class="img">
<img src="images/logo.jpg" alt="">
</div>
    </div>
         <?php 
                    include "footer.php";
            ?>
            