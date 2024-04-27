<?php require_once('connexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="assets/css/ajouter.css">
</head>
<body>
    <div id="container2">
        <form name="formAdd action="" method="post" class="formulaire" enctype="multipart/form-data" >
        <h2 align="center">Add new car </h2>
        <label><b>Plate :</b></label>
        <input type="text" name="txtImm" class="zonetext" placeholder="Enter plate" required>
        <label><b>Name :</b></label>
        <input type="text" name="txtname" class="zonetext" placeholder="Enter Name" required>
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
        <input type="submit" name="btadd" value="Add" id="submit">
        <p> <a  href="acceuil.php" class="submit">Dashboard</a></p>
        <label style="text-align: center;color:brown"></label>
        <?php 
if(isset($_POST['btadd'])){
    $imm=$_POST['txtImm'];
    $name=$_POST['txtname'];
    $price=$_POST['txtloc'];
    $cons=$_POST['txtcons'];
    $modele=$_POST['txtmod'];
    $transmission=$_POST['txttransm'];
    $fuel=$_POST['txtfuel'];
    $image=$_FILES['txtphoto']['tmp_name'];
    $traget="images/".$_FILES['txtphoto']['name'];
    move_uploaded_file($image,$traget);
    $reqAdd="INSERT INTO automobile(imm, marque, prix_loc, consommation, modele, transm, carburant, photo) 
    VALUES ('$imm', '$name', '$price', '$cons', '$modele', '$transmission', '$fuel', '$traget')";
    $resultat=mysqli_query($cnlocar,$reqAdd);
    if($resultat){
        echo"Succes";
    }
    else{
        echo"Error , try again";
    }

}
?>
    </form>




    </div>

</body>
</html>