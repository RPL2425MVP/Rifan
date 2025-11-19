<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/CSS/baseStyle.css" rel="stylesheet" type="text/css">
    <link href="Assets/CSS/home.css" rel="stylesheet" type="text/css">
    <link href="Assets/CSS/auth.css" rel="stylesheet" type="text/css">
    <link href="Assets/bcss/bootstrap.min.css" rel="stylesheet" type="text/css">

    <title>Index</title>
</head>
<body>
    <nav class="navbar">
        <div><img class="logo" src="Assets/Images/logo.jpg" alt=""></div>

        <ul class="nav-links">
            <li><a href="?pages=home">Home</a></li>
            <li><a href="#">Store</a></li>
        </ul>

        <div class="icons">
            <a href=""><i class="fa-solid fa-search"></i></a>
            <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="?pages=login"><i class="fa-solid fa-user"></i></a>
        </div>
    </nav>

    <div>
    <?php 
    include "Pages/menu.php";
    ?>
    </div>

    <footer class="footer">
    <div class="footer-content">
        <div class="logo-section">
            <img class="logo" src="Assets/Images/logo.jpg" alt="">
            <p class="logo-name">Nama</p>
        </div>

        <nav class="footer-links">
            <a href="#about">About Us</a>
            <a href="#contact">Contact Us</a>
            <a href="#privacy">Privacy Policy</a>
            <a href="#agreement">User Agreement</a>
            <a href="#shipping">Shipping</a>
        </nav>

        <div class="bottom-row">
            <p class="copyright">Copyright© 2025</p>
            <div class="social-icons">
                <a href="#instagram"><i  class="fa-brands fa-instagram"></i></a>
                <a href="#twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="#youtube"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>
<script src="https://kit.fontawesome.com/0d4d4af315.js" crossorigin="anonymous"></script>
<script src="Assets/js/bootstrap.min.js"></script>
</html>
