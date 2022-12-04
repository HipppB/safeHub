
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Modifier le profil</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/inscription.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />

        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>
        <script
            type="text/javascript"
            src="../views/scripts/modifyProfile.js"
            defer
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div
            class="header-container"
            title="Modifier le profil"
            leftButtonPath="../views/assets/icons/backButton.svg"
            width="25px"


        ></div>

        <form id="modify-profile-form">
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    name="name"
                    placeholder="Prénom"
                    value="<?php echo $user['name']; ?>"
                    path="../views/assets/icons/person.svg"
                ></div>
                <div
                    class="input-label-container"
                    name="lastname"
                    placeholder="Nom"
                    value="<?php echo $user['lastname']; ?>"
                    path="../views/assets/icons/person.svg"
                ></div>
                <div
                    class="input-label-container"
                    type="phone"
                    name="phone"
                    placeholder="Telephone"
                    value="<?php echo $user['phone']; ?>"
                    path="../views/assets/icons/lock.svg"
                ></div>
                <div
                    class="input-label-container"
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="<?php echo $user['email']; ?>"
                    path="../views/assets/icons/mail.svg"
                ></div>
            </div>
            <!-- gradienttext urbanist -->

            <input type="submit" class="button mT25" value="Envoyer" />
            <div class="mT10 mB50 s05 urbanist gradienttext">
                <a
                    href="../views/resetPassword.html"
                    class="textstyle urbanist effectHovertext"
                    >Changer votre mot de passe</a
                >
            </div>
        </form>
        <!-- Footer -->
        <div class="footer-container" small="true"></div>
    </body>
</html>