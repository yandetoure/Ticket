<!-- <?php
include_once 'config.php';

// if($_SERVER['REQUEST_METHOD'] === "POST" ){
    if (isset($_POST['envoyer'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $passport_number = $_POST['passport_number'];
    $telephone = $_POST['telephone'];
    $arrival_point = $_POST['arrival_point'];
    $adress = $_POST['adress'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $class = $_POST['class'];
    $mode = $_POST['mode'];
    $pays = $_POST['pays'];
    $creation_date = date("Y-m-d H:i:s");

    $ticket->addTicket($connexion,$first_name,$last_name, $email, $passport_number, $arrival_date, $class, $mode, $pays, $creation_date, $departure_date,$telephone, $adress, $return_date);
    header("location:index.php");
}else{
    echo "erreur";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente de billet d'avion</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /*Ajout d'une image en arrière plan */
.body{
    background-image: url(images/1.jpg);
        display: flex;
    flex-direction: column;
    justify-content: center;
}
/*CSS du card  */
        .card-title{
            font-size: 26px;
            font-weight: bold;
            margin-top: 60px;
            color:#fff;
 
        }
        label{
            font-size: 15px;
        }
        /* Style pour changer la couleur du texte en brun */
       

        /* Style pour arrondir les bords des entrées */
        .form-control {
            border-radius: 15px;
        }
        .btn-brown {
            background-color: rgba(23, 0, 0, 0.8);
            border-color: #fff;
            color:#fff;
            font-size: 14px;
            font-weight: bold;
        }
        .card{
    background-color: rgba(23, 0, 0, 0.5);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 8px;
    label{
        text-align: center;
        font-size: 17px;
        font-weight: bold;
        color:#fff;
     }
        }
    </style>
</head>
<body class="body">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Formulaire de Réservation de billet d'avion</h2>
                        <form action="add.php" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="text-brown">Prénom :</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="text-brown">Nom :</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passport_number" class="text-brown">Numéro Passeport :</label>
                                        <input type="text" class="form-control" id="passport_number" name="passport_number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adress" class="text-brown">Adresse :</label>
                                        <input type="text" class="form-control" id="adress" name="adress" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="text-brown">Email :</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="text-brown">Téléphone :</label>
                                        <input type="tel" class="form-control" id="telephone" name="telephone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departure_date" class="text-brown">Date de départ :</label>
                                        <input type="date" class="form-control" id="departure_date" name="departure_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="return_date" class="text-brown">Date de retour :</label>
                                        <input type="date" class="form-control" id="return_date" name="return_date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pays" class="text-brown">Billet pour :</label>
                                        <select name="departure_point" id="departure_point" class="form-control">
                        <?php
                        $requete = "SELECT id, name FROM Pays";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class" class="text-brown">Classe du voyage :</label>
                                        <select name="departure_point" id="departure_point" class="form-control">
                        <?php
                        $requete = "SELECT id, name FROM Class";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mode" class="text-brown">Mode du voyage :</label>
                                        <select name="departure_point" id="departure_point" class="form-control">
                        <?php
                        $requete = "SELECT id, name FROM Mode";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                        }
                        ?>
                    </select>php
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="envoyer"  class="btn btn-brown btn-block mt-4">Réserver le billet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->
