<?php require_once('connexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="assets/css/tableaubord.css">
</head>
<body>
    <div id="global">
        <div id="profil">
            <?php 
            session_start();
            echo "Welcome " . $_SESSION['monLogin'] . "<br>";
            $req = "SELECT * FROM usersadmn WHERE username='" . $_SESSION['monLogin'] . "'";
            $resultat = mysqli_query($cnlocar, $req);
            $ligne = mysqli_fetch_assoc($resultat);
            ?>
            <img src="<?php echo $ligne['photo']; ?>"  class="myphoto">
            <br>
            <a href="deconnecter.php">Log out</a>
        </div>
        <div id="dashboard">
            <?php include("tableaubord.php") ?>
            
        </div>
    </div>

    
</body>
</html>

