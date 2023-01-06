<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Mentions légales</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <link rel="stylesheet" href="../views/styles/cguMentionsLegales.css" />
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div
            class="header-container"
            title="Mentions légales"
            leftButtonPath="../views/assets/icons/backButton.svg"
            width="25px"
        ></div>
        <div class="icon-container-modify mR25 mT50">
            <a> <img src="../views/assets/icons/modify.svg" /></a>
        </div>
        <form>
            <p class="paragraphCgu mT10">
                <?php printTranslation('mentions'); ?>
            </p>
            <br />
            <input type="text" id="mentions" /><br />
        </form>
        <div class="mL20 mR20 mB50">
            <div class="mT20">
                <p class="cguTitle">1. Lorem</p>
                <p class="paragraphCgu mT10">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
            <div class="mT20">
                <p class="cguTitle">2. Lorem</p>
                <p class="paragraphCgu mT10">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
            <div class="mT20">
                <p class="cguTitle">3. Lorem</p>
                <p class="paragraphCgu mT10">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </p>
            </div>
        </div>
        <!-- Footer -->
        <div class="footer-container" small="true"></div>
    </body>
</html>
