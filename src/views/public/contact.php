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


        <script type="text/javascript" src="views/scripts/contact.js" async></script>

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
        <?php if (!empty($response)) {
            echo "<div class='error-contact'><p>$response</p></div>";
        }
        ?>
        <form id="contact_form" method='POST'>
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    name="firstname"
                    placeholder="Prénom"
                    path=""
                    value='<?php echo $firstname; ?>'
                ></div>
                <span class='error-block'></span>

                <div
                    class="input-label-container"
                    name="surname"
                    placeholder="Nom"
                    path=""
                    value='<?php echo $surname; ?>'
                ></div>
                <span class='error-block'></span>

                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="Email"
                    path=""
                    value='<?php echo $email; ?>'
                ></div>
                <span class='error-block'></span>

                <div
                    class="input-label-container"
                    type="number"
                    name="telephone"
                    placeholder="Telephone"
                    path=""
                    value='<?php echo $telephone; ?>'
                ></div>
                <span class='error-block'></span>

                <div
                    class="input-label-container"
                    name="message"
                    placeholder="Message"
                    multiline="true"
                    path=""
                    value="<?php echo strip_tags($message); ?>"
                ></div>
                <span class='error-block'></span>

                <input type="submit" class="button mT25" value="Envoyer" name='submit' />
            </div>
        </form>
        <div class="mT50"></div>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>

    </body>
</html>
