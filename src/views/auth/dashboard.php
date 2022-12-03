
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
        <link rel="stylesheet" href="../views/styles/dashboard.css" />
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        
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
            rightAction="window.location.href = './profile';"

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
            <form method="POST" id='form'>
                <div
                    class="input-label-container"
                    name="productUserCode"
                    placeholder="Code produit"
                ></div>
                <?php if ($error == 401) {
                    echo "<p class='error'>Code produit incorrect</p>";
                } ?>
            <input type="submit" class="button mT25" value="Ajouter" />
            </form>
        </main>
    </body>
</html>

