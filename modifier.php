<?php require_once('connexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link rel="stylesheet" href="assets/css/ajouter.css">
</head>
<body>
    <div id="container">
        <form name="formUpdate" method="post" action="" class="formulaire" enctype="multipart/form-data">
            <h2 align="center">Edit Car</h2>
            <label><b>Plate :</b></label>
            <input type="text" name="txtImm" class="zonetext" value="<?php echo $_GET['modCar'] ?>">
            <label><b>Name of car :</b></label>
            <input type="text" class="zonetext" name="txtMarque" placeholder="Enter name" required>
            <label><b>Price :</b></label>
            <input type="number" name="txtloc" class="zonetext" placeholder="Enter price" required>
            <label><b>Consommation :</b></label>
            <input type="text" name="txtcons" class="zonetext" placeholder="Enter consommation type *L/100KM" required>
            <label><b>Modele:</b></label>
            <input type="text" name="txtmod" class="zonetext" placeholder="enter Modele" required>
            <label><b>Transmission :</b></label>
            <select name="txttransm" class="zonetext" required>
                <option value="manual">Manual</option>
                <option value="automatic">Automatic</option>
            </select>
            <label><b>Fuel :</b></label>
            <select name="txtfuel" class="zonetext" required>
                <option value="gasoline">Gasoline</option>
                <option value="diesel">Diesel</option>
            </select>
            <label><b>Photo :</b></label>
            <input type="file" name="txtphoto" class="zonetext" placeholder="choose photo" required>
            <input type="submit" name="btmod" value="Submit" id="submit">
            <p><a href="acceuil.php" class="submit">Dashboard</a></p>
            <label style="text-align: center; color:brown">
                <?php 
                if(isset($_POST['btmod'])){
                    $imm=$_POST['txtImm'];
                    $marque=$_POST['txtMarque'];
                    $price=$_POST['txtloc'];
                    $cons=$_POST['txtcons'];
                    $modele=$_POST['txtmod'];
                    $transmission=$_POST['txttransm'];
                    $fuel=$_POST['txtfuel'];
                    $modifier=$_GET['modCar']; // Fix: Used correct variable name
                    $image=$_FILES['txtphoto']['tmp_name'];
                    $target="images/".$_FILES['txtphoto']['name']; // Fix: Used correct variable name
                    move_uploaded_file($image,$target);
                    $reqUpdate = "UPDATE automobile SET imm='$imm', marque='$marque', prix_loc='$price', consommation='$cons', modele='$modele', transm='$transmission', carburant='$fuel', photo='$target' WHERE imm='$modifier'";
                    $resultat=mysqli_query($cnlocar,$reqUpdate);
                    if($resultat){
                        echo"Succes";
                    } else {
                        echo"Error , try again";
                    }
                }
                ?>
            </label>
        </form>
    </div>
</body>
</html>
