<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: sign-in.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="scripts/style.css">
    <script src="scripts/cart.js"></script>  
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
                    <li class="navbar-item"><a href="index.html">Home</a></li>
                    <li class="navbar-item"><a href="catalog.html">Products</a></li>
                    <li class="navbar-item"><a href="about-us.html">About</a></li>
                    <li class="navbar-item"><a href="scripts/forbiddenScripts/profileListener.php"><img
                                src="img/icon-person.jpg" alt=""></a></li>
                    <li class="navbar-item"><a href="cart.php"><img src="img/cart-icon.png" alt=""></a>
                    </li>
                </ul>
            </section>
        </div>

        <div class="menu-overlay" id="menu-overlay"></div>
        <div class="menu">
            <ul>
                <li><a href="#" >Home</a></li>
                <li><a href="catalog.html">Products</a></li>
                <li><a href="about-us.html">About</a></li>
                <li><a href="scripts/forbiddenScripts/profileListener.php"><img src="img/icon-person.jpg"
                            alt="">Account</a></li>
                <li><a href="cart.php"><img src="img/cart-icon.png" alt=""></a></li>
            </ul>
        </div>
    </nav>
    <!-- Separator bar :) -->
    <section class="separator-bar">
        <span>Free shipping on orders over R$ 100</span>
    </section>
    <!-- Shopping Section -->
    <section class="shopping-section">
        <div class="cart-heading">
            <span class="eyebrow">YOUR ORDER</span>
            <h1>My cart</h1>
            <p>Review your items before continuing.</p>
        </div>
        <div id="cart-items" aria-live="polite"></div>
        <div id="cart-summary"></div>
        <div id="cart-empty-state" hidden>
            <h2>Your cart is empty</h2>
            <p>Browse the catalog and find what fits your routine.</p>
            <a href="catalog.html">Browse products <span aria-hidden="true">&rarr;</span></a>
        </div>
    </section>
    <a href="checkout.html" class="checkout-button" id="checkout-button" hidden>Continue to checkout <span aria-hidden="true">&rarr;</span></a>
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