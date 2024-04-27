<?php
session_start(); // Start the session
require_once('connexion.php');

// Check if the username is set in the session
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit(); // Stop further execution
}

// Fetch additional user information from the database
$username = $_SESSION['username'];
$reqUserInfo = "SELECT * FROM usersadmn WHERE username = '$username'";
$resultUserInfo = mysqli_query($cnlocar, $reqUserInfo);

// Check if the query executed successfully and user information is retrieved
if ($resultUserInfo && mysqli_num_rows($resultUserInfo) > 0) {
    // Fetch user data
    $userInfo = mysqli_fetch_assoc($resultUserInfo);
} else {
    die("User information not found."); // Stop further execution if user information not found
}

// Check if the car ID is provided in the URL
if (isset($_GET['car_id'])) {
    $car_id = mysqli_real_escape_string($cnlocar, $_GET['car_id']);

    // Query to retrieve car information based on car ID
    $reqSelectCar = "SELECT * FROM automobile WHERE imm = '$car_id'";
    $resultCar = mysqli_query($cnlocar, $reqSelectCar);

    if ($resultCar && mysqli_num_rows($resultCar) > 0) {
        // Fetch car data
        $car_info = mysqli_fetch_assoc($resultCar);
    } else {
        die("Car not found."); // Stop further execution if car not found
    }
} else {
    die("Car ID not provided."); // Stop further execution if car ID not provided
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Car</title>
    <!-- Link to your CSS file -->
    <link rel="stylesheet" href="assets/css/rent.css">
</head>
<body>
    <header class="header" data-header>
        <!-- Header content -->
    </header>

    <main>
        <section class="rent-car-section">
            <div class="container">
                <h2>Rent <?php echo $car_info['marque']; ?></h2>
                <div class="car-details">
                    <img src="<?php echo $car_info['photo']; ?>" alt="<?php echo $car_info['marque']; ?>" class="car-image" loading="lazy" />
                    <div class="car-info">
                        <p><strong>Model:</strong> <?php echo $car_info['modele']; ?></p>
                        <p><strong>Price per day:</strong> <?php echo $car_info['prix_loc']; ?> DH/DAY</p>
                    </div>
                </div>
                <h2>Complete Your Booking</h2>
                <!-- Rent button -->
                <form action="rent.php" method="POST">
                    <!-- Pre-filled car information hidden fields -->
                    <input type="hidden" name="Plate" value="<?php echo $car_info['imm']; ?>">
                    <input type="hidden" name="marque" value="<?php echo $car_info['marque']; ?>">
                    <input type="hidden" name="prix_loc" value="<?php echo $car_info['prix_loc']; ?>">
                    <!-- User information -->
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <!-- Rental dates -->
                    <div class="form-group">
                        <label for="rent_start_date">Rent Start Date:</label>
                        <input type="date" id="rent_start_date" name="rent_start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="rent_end_date">Rent End Date:</label>
                        <input type="date" id="rent_end_date" name="rent_end_date" required>
                    </div>
                    <!-- Display additional user information -->
                    <div class="additional-info">
    <p><strong>Username:</strong> <?php echo $userInfo['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $userInfo['email']; ?></p>
    <p><strong>Phone:</strong> <?php echo $userInfo['tlf']; ?></p>
    <button type="submit" class="btn">Confirm Booking</button>
</div>

                </form>
            </div>
        </section>
    </main>
</body>
</html>
