<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <link rel="stylesheet" href="../views/styles/profil.css" />
        <link rel="stylesheet" href="../views/styles/dashboardGestionnaire.css" />
        <link rel="stylesheet" href="../views/styles/user.css" />

        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />
        <script
            type="text/javascript"
            src="../views/scripts/manageUser.js"

        ></script>
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            defer
            async
        ></script>
        <title>SafeHub - utilisateur</title>
    </head>
   
    <body class="mT50 center">
         <?php
         require 'views/components/headerPrivate.php';
         require 'views/components/userProfile.php';
         ?>

        <div class="input-list-container rwidth">
        <div class="low-title">Produits</div>

            <?php if ($products == false) {
                echo '<div class="center small-text">Aucun produit</div>';
            } else {
                foreach ($products as $product) {
                    $rankMode = true;
                    require 'views/components/productListingAdmin.php';
                }
            } ?>
        </div>
    
        <div class="modifierProduit">
            <bouton class="button"><?php printTranslation(
                'addProduct'
            ); ?></bouton>
            <bouton onclick="toggleAdmin(<?php echo $user[
                'id'
            ]; ?>)" class="button-outlined">
            <?php if ($user['is_admin']) {
                printTranslation('demoteAdmin');
            } else {
                printTranslation('promoteAdmin');
            } ?>
            </bouton>
            <button onclick="toggleUserBan(<?php echo $user[
                'id'
            ]; ?>)" class="button-outlined-red mT20 mB50">
                <?php if ($user['is_banned']) {
                    printTranslation('unbanUser');
                } else {
                    printTranslation('banUser');
                } ?>
            </button>
            <button onclick="deleteUser(<?php echo $user[
                'id'
            ]; ?>)" class="button-outlined-red mT20 mB50">
                <?php printTranslation('deleteUser'); ?>
            </button>
        </div>


       

        

        <img src="../views/assets/message_icon.svg" class="messageIcon" />
    </body>
    <?php require 'views/components/footer.php'; ?>

</html>
