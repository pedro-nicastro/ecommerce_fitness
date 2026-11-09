<?php
session_start();
if (!isset($_SESSION['Email'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="scripts/style.css">
    <script src="scripts/shoppingcart.js"></script>  
</head>
<body>
    <!-- Navbar :) -->
    <nav class="navbar-bg">
        <input type="checkbox" id="menu-toggle">
        <div class="navbar">
            <section class="navbar-logo">
            <span><a href="index.html"><img src="img/logoicon.png" alt="error!"></a></span>
            </section>
            <section class="navbar-pages">
                <label for="menu-toggle" class="menu-icon">&#9776;</label>
                <ul>
                    <li class="navbar-item"><a href="index.html">Início</a></li>
                    <li class="navbar-item"><a href="products-list.html">Produtos</a></li>
                    <li class="navbar-item"><a href="about-us.html">Sobre</a></li>
                    <li class="navbar-item"><a href="scripts/forbiddenScripts/profileListener.php"><img
                                src="img/icon-person.jpg" alt="error!"></a></li>
                    <li class="navbar-item"><a href="shoppingcart.php"><img src="img/cart-icon.png" alt="error!"></a>
                    </li>
                </ul>
            </section>
        </div>

        <div class="menu-overlay" id="menu-overlay"></div>
        <div class="menu">
            <ul>
                <li><a href="#" onclick="teste()">Início</a></li>
                <li><a href="products-list.html">Produtos</a></li>
                <li><a href="about-us.html">Sobre</a></li>
                <li><a href="scripts/forbiddenScripts/profileListener.php"><img src="img/icon-person.jpg"
                            alt="error!">Perfil</a></li>
                <li><a href="shoppingcart.php"><img src="img/cart-icon.png" alt="error!"></a></li>
            </ul>
        </div>
    </nav>
    <!-- Separator bar :) -->
    <section class="separator-bar">
        <span>Frete grátis a partir de R$100</span>
    </section>
    <!-- Shopping Section -->
    <section class="shopping-section">
        <div id="carrinho"></div>
        <div id="carrinho-vazio" style="display: none;">Carrinho vazio</div>
        </div>
    </section>
    <a href="pagamento.html" class="btn-continuar-compra">Continuar compra</a>
    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-item">
                <span><a href="#"><img class="logofooter" src="img/logopng.png" alt=""></a></span>
            </div>
            <hr>
            <div class="footer-item">
                <span>CNPJ: 00.033.755/0001-92</span><br>
                <span>TELEFONE: (12) 99731-4956</span><br>
                <span><a href="https://www.instagram.com/escolamaximussjc/"><img src="img/instagram-icon.png" alt="error!"></a><a href="https://twitter.com/escola_maximus"><img src="img/twitter-icon.png" alt="error!"></a></span>
            </div>
        </div>
    </footer>
</body>

</html>