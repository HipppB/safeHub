<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
    <title>Produit - <?php printTranslation('product_list'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel='stylesheet' href='../views/styles/common/index.css'>
    <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
    <link rel="stylesheet" href="../views/styles/dashboard-products.css" />
    <link rel="stylesheet" href="../views/styles/common/classStyles.css" />
    <link rel="stylesheet" href="../views/styles/ticketuser.css" />

    <link rel="stylesheet" href="../views/styles/dashboardGestionnaire.css" />
    <link rel="stylesheet" href="../views/styles/common/classStyles.css" />

    <script type='text/javascript' src='../views/scripts/common/components.js' defer></script>
    <script
            type="text/javascript"
            src="../views/scripts/searchuser.js"
            defer
        ></script>
</head>
<body class="mT50 center">


<?php require 'views/components/headerPrivate.php'; ?>

    <main>
    <?php require 'views/components/productListing.php'; ?>


    </main>
<button class="button" onclick="window.location.href='modifyProduct?productid=<?php echo $_GET['productid'] ?>'">Modifier le produit</button>

    <div class="stroke"></div>
    <div class="input-list-container center">
        <div class="input-label-container"
            type="search"
            name="productSearch"
            placeholderInside="Rechercher un utilisateur"
            path="">
        </div>



            <div id="item-in-list userList" class="rwidth">
            <?php if ($users == false) {
                echo '<div class="center subtitle">Aucun utilisateur</div>';
            } else {
                foreach ($users as $user) {
                    require 'views/components/userListingAdmin.php';
                }
            } ?>
            </div>

        <div class="mT100"></div>

    </div>
    <!-- Footer -->

    <?php require 'views/components/footer.php'; ?>
</body>
</html>
