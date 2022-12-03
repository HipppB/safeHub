<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <link rel="stylesheet" href="../views/styles/profil.css" />
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>
        <title>SafeHub - Profil</title>
    </head>
    <body>
        <div
            class="header-container"
            title="Profil"
            leftButtonPath="../views/assets/icons/backButton.svg"
            rightButtonPath="../views/assets/icons/logout.svg"
            rightAction="window.location.href = '/logout';"
            width="25px"
        ></div>

        <div class="central-container">
            <h2 class="gradienttext">
                <?php echo $user['name'] . ' ' . $user['lastname']; ?></h2>
            <div>
            <?php if (new DateTime($user['birth_date'])) {
                $start_datetime = new DateTime();
                $diff = $start_datetime->diff(
                    new DateTime($user['birth_date'])
                );
                echo $diff->y;
            } else {
                echo 'N/A';
            } ?>    
            ans</div>
            <div class="small-stroke"></div>
            
            <?php echo '<div>' . $user['phone'] . '</div>'; ?>
            <div>
                <?php echo $user['email']; ?></h2>
            </div>
        </div>
        <div class="modifierProduit">
            <a class="button" href="./modifProfile"> Modifier le profil </a>
            <a class="button-outlined" href="./ajoutProduit"> Ajout produit </a>
            <a class="button-outlined"  href="./ticketuser"> Nouveau ticket </a>
        </div>
        <img src="../views/assets/message_icon.svg" class="messageIcon" />
        <div class="footer-container mT100" small="true"></div>

    </body>
</html>
