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
defer            async
        ></script>
        <title>SafeHub - Profil</title>
    </head>
    <body>
    <?php require 'views/components/headerPrivate.php'; ?>


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
            <?php printTranslation('year'); ?></div>
            <div class="small-stroke"></div>
            
            <?php echo '<div>' . $user['phone'] . '</div>'; ?>
            <div>
                <?php echo $user['email']; ?></h2>
            </div>
        </div>
        <div class="modifierProduit">
            <a class="button" href="./edit-profile"><?php printTranslation(
                'editProfile'
            ); ?></a>
            <a class="button-outlined" href="./ajoutProduit"><?php printTranslation(
                'addProduct'
            ); ?></a>
            <a class="button-outlined"  href="./ticketuser"><?php printTranslation(
                'newTicket'
            ); ?></a>
        </div>
        <img src="../views/assets/message_icon.svg" class="messageIcon" />
        <div class="mT100"></div>
<!-- Footer -->
<?php require 'views/components/footer.php'; ?>
    </body>
</html>
