<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - <?php printTranslation('titleCgu'); ?></title>
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
    <?php require 'views/components/headerprivate.php'; ?>

        <form method="post" class="formModif">
            <div class="bigContainer">
            <div class="input-label-container" name="cguFr" multiline="true" placeholderInside="" placeholder="<?php printTranslation(
                'versionMentionsFr'
            ); ?>" value="<?php echo translate('cgu', 'fr'); ?>" ></div>
            <div class="input-label-container" name="cguEn" multiline="true" placeholderInside="" placeholder="<?php printTranslation(
                'versionMentionsEn'
            ); ?>" value="<?php echo translate('cgu', 'en'); ?>" ></div>
            </div>
            <p><?php if ($responseEn == 'success' || $responseFr == 'success') {
                printTranslation('goodUpdate');
            } ?></p>
            <input type="submit" class="button mT25" value="<?php printTranslation(
                'send'
            ); ?>" name='submit' />
        </form>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>
    </body>
</html>
