<?php require_once('connexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer</title>
    <link rel="stylesheet" href="assets/css/supprimer.css">
</head>
<body>
    <div id="container2">
        <form name="formdelet" class="formulaire">
        <p> <a  href="acceuil.php" class="submit">Dashboard</a></p>
    <?php 
    if(isset($_GET['supCar'])){
        $sup=$_GET['supCar'];
        $reqDelete="DELETE FROM automobile WHERE imm='$sup'";
        $resultat=mysqli_query($cnlocar,$reqDelete);
    }

    if($resultat){
        echo"Deleted succesfully";

    }
    else{

        echo"Error ! Try again .";
    }
    
    
    
    ?>
        </form>
    </div>


</body>
</html>