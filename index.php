<link rel="stylesheet" href="style.css">
<?php 
                include_once "config.php";
                include "header.php";
                $sql = "SELECT Ticket.*, Pays.name AS pays_name
                FROM Ticket
                JOIN Pays ON Ticket.id_pays = Pays.id";
       $stmt = $connexion->prepare($sql);

       $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                        // Afficher les membres dans des cartes Bootstrap
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
 <div class="projcard-container">
    
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
        <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
        <div class="projcard-textbox">
        <h4>Nom du passager : <?=$row['first_name']?> <?=$row['last_name']?></h4>

          <div class="projcard-bar"></div>
          <div class="projcard-description"> 
          <div class="projcard-subtitl">Trajet du billet : <?=$row['pays_name']?></div>
          <h4> Date de départ : <?=$row['departure_date']?> </h4>
          <h4> Email du client : <?=$row['email']?> </h4>
</div>
          <div class="projcard-tagbox">
          </div>
          <span class="projcard-tag"><a href="accueil.php?id=<?=$row['id']?>">Detail</a></span>
        </div>
      </div>
    </div>
    </div>
       <?php
       }
                    
     }
    include'footer.php';
      ?>
              

