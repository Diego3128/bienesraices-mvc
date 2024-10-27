<?php

if (!isset($_SESSION["loggedin"])) {
    session_start();
}

$auth = $_SESSION["loggedin"] ?? false;
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
    <header class="header <?php echo $homePage ? 'header--home' : ' '; ?>">
        <div class="container header-container">
            <div class="bar">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="Real state logo">
                </a>

                <div class="mobile-menu">
                    <img class="burguer-icon" src="/build/img/barras.svg" alt="burguer menu">
                </div>

                <div class="right">
                    <img class="dark-mode-btn" src="/build/img/dark-mode.svg" alt="dark mode icon">

                    <nav class="navigation">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">anuncios</a>
                        <a href="/blog.php">blog</a>
                        <a href="/contacto.php">contactanos</a>
                        <?php if ($auth) : ?>
                            <a href="/close-session.php">Cerrar sesión</a>

                        <?php endif ?>
                    </nav>

                </div>
            </div><!--bar-->
            <?php if ($homePage) { ?>
                <h1 class="header-title">Lujosas y exclusivas casas y apts</h1>
            <?php } ?>
        </div>
    </header>