<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Connexion</title>
        <link rel="stylesheet" href="views/styles/connexion.css" />
        <link rel="stylesheet" href="views/styles/identificationPagesStyles.css" />
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            defer
        ></script>
    </head>
    <body>
    <?php require 'views/components/header.php'; ?>
    <img src="views/assets/hex.svg" class="blob" />

    <div class="authentificationPageContainer"> 
        <div class="title-blob-container">
            <div class="title-container">
                <h1 class="title gradienttext"><?php printTranslation(
                    'CONNEXION'
                ); ?></h1>
                <p class="subtitle"><?php printTranslation(
                    'rebonjour'
                ); ?>, <br /><?php printTranslation('manquer'); ?>&nbsp!</p>
            </div>
            <div class="illu-container">
                <img src="views/assets/form.svg" class="illu" />
            </div>
        </div>
        <form method="POST">
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="<?php printTranslation('email'); ?>"
                    path="views/assets/icons/mail.svg"
                    required
                ></div>
                <div
                    class="input-label-container"
                    type="password"
                    name="password"
                    placeholder="<?php printTranslation('password'); ?>"
                    path="views/assets/icons/lock.svg"
                    required
                ></div>
            </div>
                
            <a
                href="./forgotPassword"
                class="gradienttext urbanist s05 mT10 rightAl effectHovertext"
                ><?php printTranslation('forgot_password'); ?>?</a
            >

            <input type="submit" class="button mT25" value="<?php printTranslation(
                'connect'
            ); ?>" />
            <?php if ($error === 401) {
                echo "<p class='error'>" .
                    printTranslation('incorrect_id', true) .
                    '</p>';
            } ?>
            <div class="mT25 mB50 s05 urbanist">
            <?php printTranslation('no_account'); ?>
                <a href="./inscription" class="gradienttext urbanist effectHovertext"
                    ><?php printTranslation('signup'); ?></a
                >
            </div>
        </form>
    </div>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>

    </body>
</html>
