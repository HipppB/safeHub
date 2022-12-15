<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Dashboard Gestionnaire</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />
        <link rel="stylesheet" href="../views/styles/dashboardGestionnaire.css" />
        <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
        <link rel="stylesheet" href="../views/styles/ticketuser.css" />
        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />


        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <?php require 'views/components/headerPrivate.php'; ?>

    <body class="mT50">


        <div class="input-list-container">
            <button class="button">Ajouter un produit</button>

            <button class="button">Gestion du site</button>
        </div>

        <div class="low-title">Dernières notifications</div>

        <?php
        $notifications = false;
        if ($notifications == false) {
            echo '<div class="center subtitle">Aucune notification</div>';
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

        <div class="low-title">Produits</div>
        <?php
        $products = false;
        if ($products == false) {
            echo '<div class="center subtitle">Aucun produit</div>';
        } else {
            foreach ($products as $product) {
                echo '
                <div class="notification">
                    <div class="notif-top">
                        <div class="image-notif-normale"></div>
                        <p class="gradienttext">Nom du produit</p>
                        <div class="small">Code du produit</div>
                        <div class="small">Mardi 10:30</div>
                    </div>

                    <div class="notif-middle">
                        <p>Lorem ipsum dolor sit amet consectetur</p>
                    </div>

                <div class="stroke"></div>
                    ';
            }
        }
        ?>
        <div class="low-title">Utilisateurs</div>

        <div class="input-list-container">
        <div class="input-label-container"
            type="search"
            name="productSearch"
            placeholderInside="Rechercher un utilisateur"
            path="">
        </div>
        

        <div class="stroke"></div>
        <?php
        $users = [false];
        if ($users == false) {
            echo '<div class="center subtitle">Aucun utilisateur</div>';
        } else {
            foreach ($users as $user) {
                echo '
                <div class="userList">
                    <div>
                        <p class="gradienttext">Doe John</p>
                        <div class="small-2">20 ans</div>
                        
                    </div>
                    <div class="frow">
                    <div class="justEnd fcolumn w100p">
                        <div class="small s030">+33 7 23 24 45 45</div>
                        <div class="small s025">john.does@gmail.com</div>

                    </div>
                    <div class="center w50px">
                        <img src="../views/assets/icons/modify.svg"></div>
                    </div>
                    </div>
                </div>
                    ';
            }
        }
        ?>
        </div>

        <div class="footer-container mT100"></div>


    </body>
</html>
