<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Contact</title>
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link
            rel="stylesheet"
            href="views/styles/common/identificationPagesStyles.css"
        />
        <link rel="stylesheet" href="views/styles/contact.css" />

        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <?php require 'views/components/header.php'; ?>
        <div class="title-container">
            <h1 class="title gradienttext">Contact</h1>

            <p class="mT25 mB25 s05 urbanist">Parlez nous de nos produits !</p>
            <!-- <h1 class=> </h1> -->
            <h1 class="ligne"></h1>
        </div>
        <form method='POST'>
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    name="firstname"
                    placeholder="Prénom"
                    path=""
                ></div>
                <div
                    class="input-label-container"
                    name="surname"
                    placeholder="Nom"
                    path=""
                ></div>
                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="Email"
                    path=""
                ></div>
                <div
                    class="input-label-container"
                    type="number"
                    name="telephone"
                    placeholder="Telephone"
                    path=""
                ></div>
                <div
                    class="input-label-container"
                    name="message"
                    placeholder="Message"
                    multiline="true"
                    path=""
                ></div>
                <input type="submit" class="button mT25" value="Envoyer" />
            </div>
        </form>
        <?php if(isset($response)) {
            echo $response;
        }?>
        <!-- Footer -->
        <div class="footer-container mT50" small="false"></div>
    </body>
</html>
