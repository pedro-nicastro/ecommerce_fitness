<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: sign-in.html");
    exit();
}
require_once __DIR__ . '/scripts/registerScripts/database.php';

$email = $_SESSION['email'];
$conn = connectDatabase();
$stmt = $conn->prepare('SELECT name, username, email, tax_id FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($name, $username, $email, $taxId);
$stmt->fetch();
$stmt->close();
$conn->close();

$escapeHtml = static fn ($value) => htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="scripts/style.css">
    <title>My account | MS Supplements</title>
</head>
<body>
    <!-- Navbar :) -->
    <nav class="navbar-bg">
        <input type="checkbox" id="menu-toggle">
        <div class="navbar">
            <section class="navbar-logo">
                <span><a href="index.html"><img src="img/logoicon.png" alt=""></a></span>
            </section>
            <section class="navbar-pages">
                <label for="menu-toggle" class="menu-icon">&#9776;</label>
                <ul>
                    <li class="navbar-item"><a href="#" class="navbar-item-active">Home</a></li>
                    <li class="navbar-item"><a href="catalog.html">Products</a></li>
                    <li class="navbar-item"><a href="about-us.html">About</a></li>
                    <li class="navbar-item"><a href="scripts/forbiddenScripts/profileListener.php"><img src="img/icon-person.jpg" alt=""></a></li>
                    <li class="navbar-item"><a href="cart.php"><img src="img/cart-icon.png" alt=""></a></li>
                </ul>
            </section>
        </div>
    
        <div class="menu-overlay" id="menu-overlay"></div>
        <div class="menu">
            <ul>
                <li><a href="#" class="navbar-item-active">Home</a></li>
                <li><a href="catalog.html">Products</a></li>
                <li><a href="about-us.html">About</a></li>
                <li><a href="scripts/forbiddenScripts/profileListener.php"><img src="img/icon-person.jpg" alt="">Account</a></li>
                <li><a href="cart.php"><img src="img/cart-icon.png" alt=""></a></li>
            </ul>
        </div>
    </nav>  
    <!-- Profile section -->
        <div class="profile-section">
            <div class="profile-section-grid">
                <h1>My account</h1>
                <h2>Account details</h2>
                <div class="profile-section-div">
                    <div class="profile-left">Username</div>
                    <span><?php echo $escapeHtml($username); ?></span>
                </div>
                <div class="profile-section-div-2">
                    <div class="profile-left">Email</div>
                    <span><?php echo $escapeHtml($email); ?></span>
                </div>
            </div>
            <br>
        </div>
        <a href="about-us.html#contact-section"><p class="profile-section-p">Need help with your account details?</p></a>
        <div class="profile-section">
            <div class="profile-section-grid">
                <h1 style="margin-bottom: 10px;">Personal information</h1>
                <div class="profile-section-div">
                    <div class="profile-left">Full name</div>
                    <span><?php echo $escapeHtml($name); ?></span>
                </div>
                <div class="profile-section-div-4">
                    <div class="profile-left">Tax ID</div>
                    <span><?php echo $escapeHtml($taxId); ?></span>
                </div>
            </div>
            <br>
        </div>
        <a href="about-us.html#contact-section"><p class="profile-section-p">Need help with your personal information?</p></a><br>
        <a href="scripts/forbiddenScripts/logout.php" class="profile-section-btn">Sign out</a>
    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-item">
                <span><a href="#"><img class="logofooter" src="img/logopng.png" alt=""></a></span>
            </div>
            <hr>
            <div class="footer-item">
                <span>Company ID: 00.033.755/0001-92</span><br>
                <span>PHONE: (12) 99731-4956</span><br>
                <span><a href="https://www.instagram.com/escolamaximussjc/"><img src="img/instagram-icon.png" alt=""></a><a href="https://twitter.com/escola_maximus"><img src="img/twitter-icon.png" alt=""></a></span>
            </div>
        </div>
    </footer>
</body>
</html>
