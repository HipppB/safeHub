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
    <script type='text/javascript' src='../views/scripts/common/components.js' async></script>
</head>
<body>


<?php require 'views/components/headerPrivate.php'; ?>

    <main>
    <?php require 'views/components/productListing.php'; ?>
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
                <div class="item-in-list rwidth" onclick="window.location.href = \'./user?userid=' .
                    $user['id'] .
                    '\';">
                       
                        <div class="name">
                            <div class="gradienttext s030">' .
                    $user['name'] .
                    ' ' .
                    $user['lastname'] .
                    '</div>
                            <div class="s025 leftAl">' .
                    $user['email'] .
                    '</div>
                        </div>
  
                        <div>
                        <div class="small-2 s025">' .
                    $user['phone'] .
                    '
                        </div>
                        </div>
                        
                    </div>
                    <div class="line rwidth"></div>
               
                    ';
            }
        } ?>

    </main>
    <!-- Footer -->
    
    <?php require 'views/components/footer.php'; ?>
</body>
</html>
