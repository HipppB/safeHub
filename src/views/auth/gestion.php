<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Gestion</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
        <link rel="stylesheet" href="../views/styles/gestion.css" />
        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />

        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            defer
            async
        ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>

    <body>
    <?php require 'views/components/headerPrivate.php'; ?>


    <div class="input-list-container">
            <a class="button-outlined" href='./gestion-ticket'>Tickets</a>

            <a class="button-outlined" href='./messagerie-admin'>Messages</a>

            <a class="button-outlined" href='./faq-admin'>FAQ</a>

            <div class="wm50p" id="small-buttons">
                <a class="button-outlined" href='./mentions-legales-admin'>Mentions légales</a>

                <a class="button-outlined" href='./cgu-admin'>CGU</a>
            </div>
        </div>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>
    </body>
</html>
