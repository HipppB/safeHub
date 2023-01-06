<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Réinitialiser le mot de passe</title>
        <link rel="stylesheet" href="views/styles/common/index.css" />

        <link rel="stylesheet" href="views/styles/resetPassword.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>
    </head>
    <body>
    <?php require 'views/components/header.php'; ?>
        <img
            src="views/assets/icons/backButton.svg"
            class="backButton"
            onclick="window.location.href = './';"
        />
        <img src="views/assets/hex_reset.svg" class="blob" />
        <div class="title-container">
            <h1 class="title gradienttext">Réinitialiser le mot de passe</h1>
            <p class="subtitle">Veuillez entrer votre nouveau mot de passe !</p>
        </div>
        <div class="illu-container">
            <img src="views/assets/form_reset.svg" class="illu" />
        </div>
        <form>
            <div class="input-list-container mT25">
                <div
                    class="input-label-container"
                    type="password"
                    name="password"
                    placeholder="Mot de passe"
                    path="views/assets/icons/lock.svg"
                ></div>
                <div
                    class="input-label-container"
                    type="password"
                    name="password"
                    placeholder="Confirmer mot de passe"
                    path="views/assets/icons/lock.svg"
                ></div>
            </div>

            <input type="submit" class="button mT25" value="Réinitialiser" />
        </form>
    </body>
    <!-- Footer -->
    <?php
    $large = true;
    require 'views/components/footer.php';
    ?>
</html>
