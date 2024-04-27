<?php
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

<header class="header" data-header>
    <div class="container">
        <div class="overlay" data-overlay></div>
        <a href="#" class="logo">
            <img src="./assets/images/logo.svg" alt="A & y logo">
        </a>
        <nav class="navbar" data-navbar>
            <ul class="navbar-list">
                <li>
                    <a href="#home" class="navbar-link" data-nav-link>Home</a>
                </li>
                <li>
                    <a href="#featured-car" class="navbar-link" data-nav-link>Explore <ion-icon name="car-outline"></ion-icon> cars</a>
                </li>
                <li>
                    <a href="#" class="navbar-link" data-nav-link>About us</a>
                </li>
                <li>
                    <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
                </li>
                <?php if(!isset($_SESSION['monLogin'])): ?>
                    <li>
                        <a href="#" class="btn navbar-link" aria-labelledby="aria-label-txt" onclick="redirectToLogin()"><span id="aria-label-txt">LOGIN</span></a>
                    </li>
                    <li>
                        <a href="#" class="btn navbar-link" aria-labelledby="aria-label-txt" onclick="redirectTosignup()"><span id="aria-label-txt">SIGNUP</span></a>
                    </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['monLogin'])): ?>
                    <li>
                        <span class='navbar-link'><?php echo $welcomeMessage; ?></span>
                    </li>
                    <li>
                        <a href='deconnecter.php' class='btn navbar-link'>Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="header-actions">
            <div class="header-contact">
                <a href="tel:88002345678" class="contact-link">8 800 234 56 78</a>
                <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
            </div>
            <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
                <span class="one"></span>
                <span class="two"></span>
                <span class="three"></span>
            </button>
        </div>
    </div>
</header>
