<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Page d'accueil</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/accueil.css" />
        <link rel="stylesheet" href="../views/styles/404.css" />
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>
        <script
            type="text/javascript"
            src="../views/scripts/carousel.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div class="home-container">
            <!-- Hero section -->
            <?php require 'views/components/header.php'; ?>
            <div class="home-title-container mL25 mR25">
                <div class="title-container">
                    <h1 class="gradienttext">404</h1>
                    <p class="home-subtitle">La page demandé n'existe pas</p>
                    <a href="/" class="outline-button mT100"
                        >Retourner à l'accueil</a
                    >
                </div>
                <div>
                    <img src="../views/assets/home_blob.svg" class="blob" />
                    <img
                        src="../views/assets/home_image.svg"
                        class="mT100 homeImage"
                    />
                </div>
            </div>
        </div>
        <div class="footer-container" small="false"></div>
    </body>
</html>
