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
            src="../views/scripts/common/components.js"
defer            async
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
                    require 'views/components/productListingAdmin.php';
                }
            } ?>
        </div>
    
        <div class="modifierProduit">
            <bouton class="button">Associer un produit</bouton>
            <bouton class="button-outlined">Promouvoir gestionnaire</bouton>
            <bouton class="button-outlined">Promouvoir administrateur</bouton>
            <button class="button-outlined-red mT20 mB50">
                Supprimer l'utilisateur
            </button>
        </div>


       

        

        <img src="../views/assets/message_icon.svg" class="messageIcon" />
    </body>
    <?php require 'views/components/footer.php'; ?>

</html>
