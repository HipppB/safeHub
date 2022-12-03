<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Connexion</title>
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link rel="stylesheet" href="views/styles/connexion.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>
    </head>
    <body>
        <div class="topNavBar-container"></div>
        <img
            src="views/assets/icons/backButton.svg"
            class="backButton"
            onclick="window.location.href = './';"
        />
        <img src="views/assets/hex.svg" class="blob" />
        <div class="title-container">
            <h1 class="title gradienttext">Connexion</h1>
            <p class="subtitle">Rebonjour, <br />Vous nous avez manqué !</p>
        </div>
        <div class="responsiveCo"></div>
        <div class="illu-container">
            <img src="views/assets/form.svg" class="illu" />
        </div>
        <form method="POST">
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="Email"
                    path="views/assets/icons/mail.svg"
                ></div>
                <div
                    class="input-label-container"
                    type="password"
                    name="password"
                    placeholder="Mot de passe"
                    path="views/assets/icons/lock.svg"
                ></div>
            </div>

            <a
                href="./forgotPassword"
                class="gradienttext urbanist s05 mT10 rightAl"
                >Mot de passe oublié ?</a
            >

            <input type="submit" class="button mT25" value="Se connecter" />
            <?php
                if($error) {
                    echo "<p class='error'>Email ou mot de passe incorrect</p>";
                }
            ?>
            <div class="mT25 mB50 s05 urbanist">
                Pas de compte ?
                <a href="./inscription" class="gradienttext urbanist"
                    >S'inscrire</a
                >
            </div>
        </form>
        <!-- Footer -->
        <div class="footer-container" small="false"></div>
    </body>
</html>
