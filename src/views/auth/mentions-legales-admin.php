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
            title="Modifier mentions légales"
            leftButtonPath="../views/assets/icons/backButton.svg"
            width="25px"
        ></div>
        <form method="post" class="formModif">
            <p><?php if ($responseEn == 'success' || $responseFr == 'success') {
                echo 'Bien mis a jour';
            } ?></p>
            <div class="bigContainer">
            <div class="formContainer">
            <h3 class="formSubTitle">Pour la version française</h3>
            <textarea type="text" id="mentionsFr" name="mentionsFr" cols="60" rows="10"> <?php echo translate(
                'mentions',
                'fr'
            ); ?></textarea>
            </div>
            </br>
            <div class="formContainer"> 
            <h3 class="formSubTitle">Pour la version anglaise</h3>
            <textarea type="text" id="mentionsEn" name="mentionsEn" cols="60" rows="10"> <?php echo translate(
                'mentions',
                'en'
            ); ?></textarea>
            </div>
            </div>
            <input type="submit" class="button mT25" value="Envoyer" name='submit' />
        </form>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>
    </body>
</html>
