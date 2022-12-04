<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Inscription</title>
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link rel="stylesheet" href="views/styles/inscription.css" />

        <link rel="stylesheet" href="views/styles/common/classStyles.css" />
        <link rel="stylesheet" href="views/styles/common/topNavBar.css" />
        <link rel="stylesheet" href="views/styles/common/footer.css" />

        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div class="topNavBar-container"></div>
        <img
            src="views/assets/icons/backButton.svg"
            class="backButton"
            onclick="window.location.href = './';"
        />
        <img src="views/assets/hex_incri.svg" class="blob" />
        <div class="title-container">
            <h1 class="title gradienttext">Inscription</h1>
            <p class="subtitle">Bienvenue !</p>
        </div>

        <div class="illu-container">
            <img src="views/assets/form_inscri.svg" class="illu" />
        </div>

        <form method="POST">
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    name="firstname"
                    placeholder="Prénom"
                    path="views/assets/icons/person.svg"
                ></div>
                <?php if ($error['error-firstname']) {
                    echo "<div class='error'>Veuillez renseigner votre prénom</div>";
                } ?>
                <div
                    class="input-label-container"
                    name="lastname"
                    placeholder="Nom"
                    path="views/assets/icons/person.svg"
                ></div>
                <?php if ($error['error-lastname']) {
                    echo "<div class='error'>Veuillez renseigner votre nom</div>";
                } ?>
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
                <?php if ($error['error-password']) {
                    echo "<div class='error'>Veuillez renseigner votre mot de passe</div>";
                } ?>
            </div>

            <div class="urbanist s05 mT10 leftAl">
                En vous inscrivant, vous acceptez nos
                <a href="./CGU" class="gradienttext inter mT15">CGU</a>
                et nos <br />
                <a href="./mentionslegales" class="gradienttext inter mT15"
                    >Mentions Légales ?</a
                >
            </div>

            <input type="submit" class="button mT25" value="S'inscrire" />

            <div class="mT10 mB50 s05 urbanist">
                Vous avez déjà un compte ?
                <a href="views/connexion" class="gradienttext urbanist"
                    >Connectez-vous</a
                >
            </div>
        </form>
        <!-- Footer -->
        <div class="footer-container" small="false"></div>
    </body>
</html>