<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Dashboard Gestionnaire</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />
        <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
        <link rel="stylesheet" href="../views/styles/ticketuser.css" />
        <link rel="stylesheet" href="../views/styles/dashboardGestionnaire.css" />
        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />


        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            defer            
        ></script>
        <script
            type="text/javascript"
            src="../views/scripts/searchuser.js"
            defer            
        ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <?php require 'views/components/headerPrivate.php'; ?>

    <body class="mT50 center">
        
        
        <div class="rwidth">
        <?php if (userIsAdmin()) { ?>
            <div class="input-list-container gap10">
                <button class="button" onclick="window.location.href='ajoutProduit'"><?php printTranslation(
                    'addProduct'
                ); ?></button>

                <button class="button" onclick="window.location.href='gestion'"><?php printTranslation(
                    'GestioSite'
                ); ?></button>
            </div>
        <?php } ?>
            <div class="low-title"><?php printTranslation('LastModif'); ?></div>
            
        <?php
        $notifications = false;
        if ($notifications == false) {
            echo '<div class="small-text center">' .
                printTranslation('noNotif', true) .
                '</div>';
        } else {
            foreach ($notifications as $notification) {
                echo '
                    <div class="stroke"></div>
                    <div class="notification">
                        <div class="notif-top">
                            <div class="image-notif-importante"></div>
                            <p class="gradienttext">Notification importante</p>
                        </div>

                        <div class="notif-middle">
                            <p>Lorem ipsum dolor sit amet consectetur</p>
                            <img src="../views/assets/icons/close.svg" path="" />
                        </div>

                        <div class="small">Mardi 10h30</div>
                    </div>
                    ';
            }
        }
        ?>
        <!-- 
        class="image-notif-normale"
        class="notif-middle"
        class="notif-top"
         -->

        <div class="low-title"><?php printTranslation('products'); ?></div>
        <div class="input-list-container">
            <?php if ($products == false) {
                echo '<div class="center small-text">' .
                    printTranslation('noProduct', true) .
                    '</div>';
            } else {
                foreach ($products as $product) {
                    require 'views/components/productListingAdmin.php';
                }
            } ?>
        </div>
        <div class="low-title "><?php printTranslation('users'); ?></div>

        <div class="input-list-container">
            <div class="input-label-container"
                type="search"
                name="productSearch"
                placeholderInside="<?php printTranslation('searchUser'); ?>"
                path="">
            </div>
        

        <div class="stroke"></div>
        <div id="userList">
        <?php if ($users == false) {
            echo '<div class="center subtitle">' .
                printTranslation('noUser', true) .
                '</div>';
        } else {
            foreach ($users as $user) {
                require 'views/components/userListingAdmin.php';
            }
        } ?>
        </div>
    </div>
        
        <div class="mT100"></div>
        </div>
<!-- Footer -->
    <?php require 'views/components/footer.php'; ?>

    </body>
</html>
