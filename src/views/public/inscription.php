<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Inscription</title>
        <link rel="stylesheet" href="views/styles/identificationPagesStyles.css" />
        <link rel="stylesheet" href="views/styles/inscription.css" />
        <link rel="stylesheet" href="views/styles/common/index.css" />

        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <?php require 'views/components/header.php'; ?>
  
        <img src="views/assets/hex_incri.svg" class="blob" />
        <div class="authentificationPageContainer"> 
        <div class="title-blob-container">

        <div class="title-container">
            <h1 class="title gradienttext"><?php printTranslation(
                'inscription'
            ); ?></h1>
            <p class="subtitle"><?php printTranslation('welcome'); ?>&nbsp!</p>
        </div>

        <div class="illu-container">
            <img src="views/assets/form_inscri.svg" class="illu" />
        </div>
        </div>

        <form method="POST">
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    name="firstname"
                    placeholder="<?php printTranslation('prenom'); ?>"
                    path="views/assets/icons/person.svg"
                ></div>
                <?php if ($error['error-firstname']) {
                    echo "<div class='error'>Veuillez renseigner votre prénom</div>";
                } ?>
                <div
                    class="input-label-container"
                    name="lastname"
                    placeholder="<?php printTranslation('nom'); ?>"
                    path="views/assets/icons/person.svg"
                ></div>
                <?php if ($error['error-lastname']) {
                    echo "<div class='error'>Veuillez renseigner votre nom</div>";
                } ?>
                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="<?php printTranslation('email'); ?>"
                    path="views/assets/icons/mail.svg"
                ></div>
                
                <div
                    class="input-label-container"
                    type="password"
                    name="password"
                    placeholder="<?php printTranslation('password'); ?>"
                    path="views/assets/icons/lock.svg"
                ></div>
                <?php if ($error['error-password']) {
                    echo "<div class='error'>" .
                        printTranslation('connect', true) .
                        '</div>';
                } ?>
            </div>

            <div class="urbanist s05 mT10 leftAl">
            <?php printTranslation('bySubscribing'); ?>
                <a href="./CGU" class="gradienttext inter mT15"><?php printTranslation(
                    'terms'
                ); ?></a>
                <?php printTranslation('andour'); ?> <br />
                <a href="./mentionslegales" class="gradienttext inter mT15"
                    ><?php printTranslation('legal'); ?></a
                >
            </div>

            <input type="submit" class="button mT25" value="<?php printTranslation(
                'signup'
            ); ?>" />

            <div class="mT10 mB50 s05 urbanist">
            <?php printTranslation('has_account'); ?>
                <a href="./connexion" class="gradienttext urbanist"
                    ><?php printTranslation('signin-now'); ?></a
                >
            </div>
        </form>
        </div>

        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>
    </body>
</html>
