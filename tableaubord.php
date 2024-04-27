<?php require_once('connexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/tableaubord.css">
</head>
<body>
    <div class="container">
        <h1>Car List</h1>
        <?php 
        $reqselect = "SELECT * FROM automobile";
        $resultat = mysqli_query($cnlocar, $reqselect);
        $nbr = mysqli_num_rows($resultat);
        echo "<p>Total <b>$nbr</b> Cars</p>";
        ?>
        <p><a href="Ajouter.php" class="action-btn add-btn"><img src="images/ajouter.png" width="50px" height="50px"  ></a></p>
        <table>
            <tr>
                <th>Plate</th>
                <th>Name</th>
                <th>Price</th>
                <th>Consommation</th>
                <th>Modele</th>
                <th>Transmission</th>
                <th>Fuel</th>
                <th>Picture</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php while($ligne = mysqli_fetch_assoc($resultat)) { ?>
                <tr>
                    <td><?php echo $ligne['imm'] ?></td>
                    <td><?php echo $ligne['marque'] ?></td>
                    <td><?php echo $ligne['prix_loc'] ?></td>
                    <td><?php echo $ligne['consommation'] ?></td>
                    <td><?php echo $ligne['modele'] ?></td>
                    <td><?php echo $ligne['transm'] ?></td>
                    <td><?php echo $ligne['carburant'] ?></td>
                    <td><img src='<?php echo $ligne['photo']; ?>' class="photocar"></td>
                    <td><a href="modifier.php?modCar=<?php echo $ligne['imm'];?>" class="action-btn add-btn"><img src="images/modifer.jpg" width="50px" height="50px"  ></a></td>
                    <td><a href="supprimer.php?supCar=<?php echo $ligne['imm'];?>" class="action-btn delete-btn"><img src="images/supprimer.png" width="50px" height="50px"  ></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
