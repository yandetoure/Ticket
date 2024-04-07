<link rel="stylesheet" href="style.css">
<?php 
                include_once "config.php";
                include "header.php";
                $sql = "SELECT * ,billets.id AS billets FROM billets
                 JOIN client ON billets.client_id=client.id ";
                $stmt = $connexion->prepare($sql);
                // $stmt->bindParam('id',$_GET['id']);
                $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                        // Afficher les membres dans des cartes Bootstrap
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
 <div class="projcard-container">
    
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
        <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
        <div class="projcard-textbox">
          <div class="projcard-title">Client: <?=$row['prenom']?><?=$row['nom']?></div>
          <div class="projcard-subtitle">Prix du billet : <?=$row['prix']?></div>
          <div class="projcard-bar"></div>
          <div class="projcard-description">Nous sommes ravis de vous accueillir à bord de notre vol de <?=$row['trajet']?>. Votre aventure commence le <?=$row['date_reservation'] ?>, et nous sommes impatients de faire partie de votre voyage. Préparez-vous à vivre une expérience de vol exceptionnelle avec nous.

Bon voyage,</div>
          <div class="projcard-tagbox">
          </div>
          <span class="projcard-tag"><a href="accueil.php?id=<?=$row['billets']?>">Detail</a></span>
        </div>
      </div>
    </div>
    </div>
                        <?php
                    }
                    
                }
                include'footer.php';
            ?>
              

