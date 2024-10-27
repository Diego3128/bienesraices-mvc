<?php
$auth = $_SESSION["loggedin"] ?? false;
$homePage = $homePage ?? false;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real estate</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $homePage ? 'header--home' : ''; ?>">
        <div class="container header-container">
            <div class="bar">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Real state logo">
                </a>

                <div class="mobile-menu">
                    <img class="burguer-icon" src="/build/img/barras.svg" alt="burguer menu">
                </div>

                <div class="right">
                    <img class="dark-mode-btn" src="/build/img/dark-mode.svg" alt="dark mode icon">

                    <nav class="navigation">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">anuncios</a>
                        <a href="/blog">blog</a>
                        <a href="/contacto">contactanos</a>
                        <?php if ($auth) : ?>
                            <a href="/logout">Cerrar sesión</a>
                        <?php endif ?>
                    </nav>

                </div>
            </div><!--bar-->
            <?php if ($homePage) { ?>
                <h1 class="header-title">Lujosas y exclusivas casas y apts</h1>
            <?php } ?>
        </div>
    </header>


    <?php echo $contenido; ?>


    <footer class="footer section">
        <div class="container footer-container">
            <nav class="navigation">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">anuncios</a>
                <a href="/blog">blog</a>
                <a href="/contacto">contactanos</a>
            </nav>
            <p class="copyright"> &copy; All rights reserved <?php echo date('Y'); ?></p>
        </div>


    </footer>

    <!-- Modernizer script -->
    <!-- <script src="./src/js/modernizr.js"></script> -->
    <script src="/build/js/bundle.min.js"></script>
</body>

</html>