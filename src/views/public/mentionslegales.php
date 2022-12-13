<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Mentions légales</title>
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link rel="stylesheet" href="views/styles/cguMentionsLegales.css" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    <?php require 'views/components/header.php'; ?>
        <div class="mL20">
            <p class="gradienttext title mT50">Mentions légales</p>
            <p class="updateTitle">Dernière mise à jour le X</p>
        </div>
        <div class="line mT50"></div>
        <div class="mL20 mR20 mT25 mB50">
            <div class="mT20">
                <p class="cguTitle">Les Mentions Légales</p>
                <p class="paragraphCgu mT10">
                <?php printTranslation('mentions'); ?></p>
            </div>
        </div>    
        <div class="footer-container" small="false"></div>
    </body>
</html>
