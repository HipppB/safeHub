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
        <div class="input-list-container">

        <?php if ($products == false) {
            echo '<div class="center subtitle">Aucun produit</div>';
        } else {
            foreach ($products as $product) {
                echo '
                <div class="userList">
                <div class="frow">
                    <div>
                        <div class="image-notif-normale">
                        </div>
                    </div>
                    
                    <div class="mL50 mR15">
                            <p class="gradienttext">' .
                    $product['product_name'] .
                    '</p>
                                    <div class="small-2 ">' .
                    $product['room_name'] .
                    '</div>
                    </div>

                        
                        <div>
                        <div class="small-2 s025">' .
                    $product['user_code'] .
                    '
                    
                        </div>
                    </div>
                    </div>

                    <div class="center w50px">
                            <img src="../views/assets/icons/modify.svg">
                        </div>



                </div>
                    ';
            }
        } ?>
        </div>
        <div class="low-title">Utilisateurs</div>

        <div class="input-list-container">
        <div class="input-label-container"
            type="search"
            name="productSearch"
            placeholderInside="Rechercher un utilisateur"
            path="">
        </div>
        

        <div class="stroke"></div>
        <?php if ($users == false) {
            echo '<div class="center subtitle">Aucun utilisateur</div>';
        } else {
            foreach ($users as $user) {
                $age = 'N/A';
                if (new DateTime($user['birth_date'])) {
                    $start_datetime = new DateTime();
                    $diff = $start_datetime->diff(
                        new DateTime($user['birth_date'])
                    );
                    $age = $diff->y;
                }
                echo '
                <div class="userList">
                    <div>
                        <p class="gradienttext">' .
                    $user['name'] .
                    ' ' .
                    $user['lastname'] .
                    '</p>
                        <div class="small-2">' .
                    $age .
                    ' ans</div>
                        
                    </div>
                    <div class="frow">
                        <div class="justEnd fcolumn w150p">
                            <div class="small s030">' .
                    $user['email'] .
                    '</div>
                            <div class="small s025">' .
                    $user['phone'] .
                    '</div>
                        </div>
                        <div class="center w50px">
                            <img src="../views/assets/icons/modify.svg">
                        </div>
                    </div>
                </div>
                    ';
            }
        } ?>
        </div>

        <div class="mT100"></div>
<!-- Footer -->
<?php
$large = false;
require 'views/components/footer.php';
?>

    </body>
</html>
