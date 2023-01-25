<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
    <title>Produit - <?php printTranslation('product_list'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel='stylesheet' href='../views/styles/common/index.css'>
  <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
  <link rel="stylesheet" href="../views/styles/dashboard-products.css" />
  <script type='text/javascript' src='../views/scripts/common/components.js' async></script>
</head>
<body>


<?php require 'views/components/headerPrivate.php'; ?>

    <main>


          <section>
            <header>
              <img src='../views/assets/icons/homeInline.svg' alt='house'>
              <h2 class='gradienttext'>
              <?php echo $product['product_name']; ?>
              (
              <?php echo $product['room_name']; ?>
              )</h2>
            </header>
            <div class='graphList'>
            <a href='./datas?productId=<?php echo $product[
                'id'
            ]; ?>&type=temperature'>
            <div>
               <img src='../views/assets/graph.svg' alt='graph'/>
                <?php printTranslation('temperature'); ?></div>
</a>

                            <a href='./datas?productId=<?php echo $product[
                                'id'
                            ]; ?>&type=humidity'>
                            <div>
                        <img src='../views/assets/graph.svg' alt='graph'/> <?php printTranslation(
                            'humidity'
                        ); ?></div></a>

                          <a href='./datas?productId=<?php echo $product[
                              'id'
                          ]; ?>&type=carbon_dioxide'>
                          <div>
              <img src='../views/assets/graph.svg' alt='graph'/>
CO2</div>
                </a>

                          <a href='./datas?productId=<?php echo $product[
                              'id'
                          ]; ?>&type=sound_level'>
                          <div>
               <img src='../views/assets/graph.svg' alt='graph'/><?php printTranslation(
                   'sound_level'
               ); ?></div></a>

            </div>
        </section>
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
