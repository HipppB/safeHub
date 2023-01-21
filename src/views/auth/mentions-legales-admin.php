<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Modifier mentions légales</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <link rel="stylesheet" href="../views/styles/cguMentionsLegales.css" />
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
defer            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div
            class="header-container"
            title="Modifier mentions légales"
            leftButtonPath="../views/assets/icons/backButton.svg"
            width="25px"
        ></div>
        <form method="post" class="formModif">
            <div class="bigContainer">
            <div class="input-label-container" name="mentionsFr" multiline="true" placeholderInside="" placeholder="<?php printTranslation(
                'versionMentionsFr'
            ); ?>" value="<?php echo translate('mentions', 'fr'); ?>" ></div>
            <div class="input-label-container" name="mentionsEn" multiline="true" placeholderInside="" placeholder="<?php printTranslation(
                'versionMentionsEn'
            ); ?>" value="<?php echo translate('mentions', 'en'); ?>" ></div>
            </div>
            <p><?php if ($responseEn == 'success' || $responseFr == 'success') {
                echo 'Mise à jour effectuée';
            } ?></p>
            <input type="submit" class="button mT25" value="<?php printTranslation(
                'send'
            ); ?>" name='submit' />
        </form>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>
    </body>
</html>
