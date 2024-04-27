<?php 
require_once('connexion.php');
// Check if session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$welcomeMessage = '';

// Check if the user is logged in
if(isset($_SESSION['monLogin'])) {
    $username = $_SESSION['monLogin'];
    $welcomeMessage = "Welcome, $username!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ridex - Rent your favourite car</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- 
    - #HEADER
  -->

    <?php include 'includes/header.php'; ?>


    <main>
        <article>

            <!-- 
        - #firstpage
      -->

            <?php include 'includes/firstpage.php'; ?>




            <!-- 
        - #FEATURED CAR
      -->

            <?php include 'includes/featuredcar.php'; ?>




            <!-- 
        - #GETSTARTED
      -->

            <?php include 'includes/getstarted.php'; ?>




            <!-- 
        - #BLOG
      -->

        </article>
    </main>


    <!-- 
    - #FOOTER
  -->

    <?php include 'includes/footer.php'; ?>



    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
<?php
require_once('connexion.php');
// Check if session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$welcomeMessage = '';

// Check if the user is logged in
if(isset($_SESSION['monLogin'])) {
    $username = $_SESSION['monLogin'];
    $_SESSION['username'] = $username; // Set the username in the session for later use
    $welcomeMessage = "Welcome, $username!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ridex - Rent your favourite car</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- 
    - #HEADER
  -->

    <?php include 'includes/header.php'; ?>


    <main>
        <article>

            <!-- 
        - #firstpage
      -->

            <?php include 'includes/firstpage.php'; ?>




            <!-- 
        - #FEATURED CAR
      -->

            <?php include 'includes/featuredcar.php';?>


            <!-- 
        - #GETSTARTED
      -->

            <?php include 'includes/getstarted.php'; ?>




            <!-- 
        - #BLOG
      -->

        </article>
    </main>


    <!-- 
    - #FOOTER
  -->

    <?php include 'includes/footer.php'; ?>



    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
