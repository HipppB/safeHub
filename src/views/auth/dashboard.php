<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
        <link rel="stylesheet" href="../views/styles/dashboard.css" />
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>
    </head>

    <body>
        <div
            class="header-container"
            title="Dashboard"
            leftButtonPath="../views/assets/icons/backButton.svg"
        ></div>

        <main>
            <div id="text">
                <p>Vous n'avez pas de produit associé à votre compte</p>
                <hr />
                <p>
                    Rentrez le code produit qui vous a été donné afin de les
                    importer.
                </p>
            </div>
            <form method="POST">
                <div
                    class="input-label-container"
                    name="firstname"
                    placeholder="Code produit"
                ></div>
            <input type="submit" class="button mT25" value="Ajouter" />
            </form>
        </main>
    </body>
</html>
