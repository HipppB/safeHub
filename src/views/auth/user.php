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
    <?php require 'views/components/headerPrivate.php'; ?>

    <body class="mT50 center">


        <div class="central-container">
            <h2 class="gradienttext">Nom Prénom</h2>
            <div>XX ans</div>
            <div class="small-stroke"></div>
            <div>+33 9 75 43 78 07</div>
            <div>example@example.com</div>
</div>
        <div class="input-list-container rwidth">
        <div class="low-title">Produits</div>

            <?php if ($products == false) {
                echo '<div class="center small-text">Aucun produit</div>';
            } else {
                foreach ($products as $product) {
                    echo '
                    <div class="item-in-list rwidth" onclick="window.location.href = \'./product?productid=' .
                        $product['id'] .
                        '\';">
                        <div>
                            <div class="image-notif-normale">
                            </div>
                        </div>
                        
                        <div class="name">
                            <div class="gradienttext s030">' .
                        $product['product_name'] .
                        '</div>
                            <div class="s025 leftAl">' .
                        $product['room_name'] .
                        '</div>
                        </div>
  
                        <div>
                        <div class="small-2 s025 mR10">' .
                        $product['user_code'] .
                        '
                        </div>
                        </div>      
                    </div>
                    <div class="line rwidth"></div>

                        ';
                }
            } ?>
        </div>
        <!-- <div class="notif"> 
        <div class="top">
                <div class="notif-importante">
                    <blockquote><div class="gradienttext">nom du produit</div></blockquote>
                    <div class="right">10/02/2022</div>
            </div>
        <div> -->

            

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
