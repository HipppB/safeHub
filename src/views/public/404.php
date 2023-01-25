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
defer            async
        ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    
        <div class="home-container">
            <!-- Hero section -->
            <?php require 'views/components/header.php'; ?>
            <div class="home-title-container">
                <div class="title-container">
                    <h1 class="gradienttext">404</h1>
                    <p class="home-subtitle"><?php printTranslation(
                        '404'
                    ); ?></p>
                    <a href="/" class="outline-button mT100"
                        ><?php printTranslation('backHome'); ?></a
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
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>
    </body>
</html>
