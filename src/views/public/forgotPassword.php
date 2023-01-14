<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Mot de passe oublié</title>
        <link rel="stylesheet" href="views/styles/identificationPagesStyles.css" />

        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link rel="stylesheet" href="views/styles/forgotPassword.css" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    <?php require 'views/components/header.php'; ?>

        <img src="views/assets/hex_forgot.svg" class="blob" />
        <div class="authentificationPageContainer"> 
        <div class="title-blob-container">

        <div class="title-container">
            <h1 class="title gradienttext">Mot de passe oublié</h1>
            <p class="subtitle">
                Veuillez entrer l’adresse email <br />
                associée à votre compte&nbsp!
            </p>
        </div>
        <div class="illu-container">
            <img src="views/assets/form_forgot.svg" class="illu" />
        </div>
        </div>
        <form>
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="Email"
                    path="views/assets/icons/mail.svg"
                ></div>
            </div>

            <input type="submit" class="button mT50" value="Envoyer" />
        </form>
        </div>
        <div class="mT50"></div>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>

    </body>
</html>
