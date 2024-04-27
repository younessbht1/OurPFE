

<?php
require_once('connexion.php');

// Function to check if the logged-in user is an admin
function isAdmin($username, $password) {
    global $cnlocar;
    // Use prepared statements to prevent SQL injection
    $req = "SELECT * FROM usersadmn WHERE username=? AND password=?";
    $stmt = mysqli_prepare($cnlocar, $req);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    return ($row && $row['admin'] == 1); // Assuming there's a column named 'admin' in the database indicating admin status
}

$loginError = '';

if(isset($_POST['btlogin'])) {
    $username = $_POST['txtlogin'];
    $password = $_POST['txtpw'];

    if(isAdmin($username, $password)) {
        session_start();
        $_SESSION['monLogin'] = $username;
        header("location: acceuil.php"); // Redirect to acceuil.php for admins
        exit();
    } else {
        // Use prepared statements to prevent SQL injection
        $req = "SELECT * FROM usersadmn WHERE username=? AND password=?";
        $stmt = mysqli_prepare($cnlocar, $req);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            session_start();
            $_SESSION['monLogin'] = $username;
            header("location: index.php"); // Redirect to home.php for regular users
            exit();
        } else {
            $loginError = "<font color='#F0001D'>Username or password not valid</font>";
            header("location: login.php"); // Redirect to login.php for false login information
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- 
  - custom css link
-->
<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/login.css">
<!-- 
  - google font link
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
  rel="stylesheet">
</head>
<body>

<section class="section hero">

      <div class="hero-banner"></div>

      <div class="container">
          <form action="" method="POST" class="hero-form">
              <div class="input-wrapper">
                  <label for="username" class="input-label">Username</label>
                  <input type="text" name="txtlogin" id="username" class="input-field" placeholder="Enter your username" required>
              </div>
              <div class="input-wrapper">
                  <label for="password" class="input-label">Password</label>
                  <input type="password" name="txtpw" id="password" class="input-field" placeholder="Enter your password" required>
              </div>
              <button type="submit" name="btlogin" class="btn">Login</button>
              
          </form>
          
          <a href="index.php" class="back-to-home"><i class="fas fa-arrow-left"></i> Back to Home </a>
          <?php if(isset($loginError)) echo $loginError; ?>
      </div>

</section>

<!-- 
    - #FOOTER
  -->


    <?php include 'includes/footer.php'; ?>

<script src="./assets/js/script.js"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
