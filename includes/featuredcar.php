<div class="container">
                <div class="car-container">
                    <?php
                    // Query to select all automobiles
                    $reqSelect = "SELECT * FROM automobile";
                    $resultat = mysqli_query($cnlocar, $reqSelect);

                    // Check if the query executed successfully
                    if (!$resultat) {
                        // Handle query execution error
                        die('Error: ' . mysqli_error($cnlocar));
                    }

                    $numColumns = 3; // Number of columns in the grid
                    $count = 0; // Initialize count for table cells

                    // Fetch data and display cars
                    while ($ligne = mysqli_fetch_assoc($resultat)) {
                        if ($count % $numColumns == 0) {
                            echo '<div class="row">'; // Start new row
                        }
                        ?>
                        <div class="col">
                            <div id="featured-car" class="featured-car-card">
                                <figure class="card-banner">
                                    <img src="<?php echo $ligne['photo']; ?>" alt="<?php echo $ligne['marque']; ?>" class="car-image" loading="lazy" />
                                </figure>
                                <div class="card-content">
                                    <div class="card-title-wrapper">
                                        <h3 class="h3 card-title"><?php echo $ligne['marque']; ?></h3>
                                        <data class="year" value="2019"><?php echo $ligne['modele']; ?></data>
                                    </div>
                                    <ul class="card-list">
                                        <li class="card-list-item">
                                            <ion-icon name="people-outline"></ion-icon>
                                            <span class="card-item-text">Capacity: 4 People</span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="flash-outline"></ion-icon>
                                            <span class="card-item-text">Fuel: <?php echo $ligne['carburant']; ?></span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="speedometer-outline"></ion-icon>
                                            <span class="card-item-text">Consomation: <?php echo $ligne['consommation']; ?></span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="hardware-chip-outline"></ion-icon>
                                            <span class="card-item-text">Transmission: <?php echo $ligne['transm']; ?></span>
                                        </li>
                                    </ul>
                                    <div class="card-price-wrapper">
                                        <p class="card-price"><?php echo $ligne['prix_loc']; ?>DH/DAY</p>
                                        <!-- Pass car information to rent.php -->
                                        <button class="btn" onclick="<?php echo isset($_SESSION['monLogin']) ? "window.location.href='rent.php?car_id=" . $ligne['imm'] . "&marque=" . $ligne['marque'] . "&modele=" . $ligne['modele'] . "&carburant=" . $ligne['carburant'] . "&consommation=" . $ligne['consommation'] . "&transm=" . $ligne['transm'] . "&prix_loc=" . $ligne['prix_loc'] . "'" : "window.location.href='login.php'"; ?>">
                                            Rent now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $count++;
                        if ($count % $numColumns == 0) {
                            echo '</div>'; // End row
                        }
                    }
                    // Close car container if not already closed
                    if ($count % $numColumns != 0) {
                        echo '</div>'; // End row
                    }
                    ?>
                </div>
            </div>