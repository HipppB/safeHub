<?php

/** @var array $products */

?>


<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
    <title>Dashboard - <?php printTranslation('product_list'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel='stylesheet' href='../views/styles/common/index.css'>
  <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
  <link rel="stylesheet" href="../views/styles/dashboard-products.css" />
  <script type='text/javascript' src='../views/scripts/common/components.js' async></script>
</head>
<body>


<?php require 'views/components/headerPrivate.php'; ?>

    <main>

      <?php foreach ($products as $product) { ?>
          <section>
            <header>
              <img src='../views/assets/icons/homeInline.svg' alt='house'>
              <h2 class='gradienttext'>
              <?php echo $product['product_name'] ?>
              (
              <?php echo $product['room_name']?>
              )</h2>
            </header>
            <div class='graphList'>
            <a href='./datas?productId=<?php echo $product['id']?>&type=temperature'>
            <div>
               <img src='../views/assets/graph.svg' alt='graph'/>
             Température</div>
</a>

                            <a href='./datas?productId=<?php echo $product['id']?>&type=humidity'>
                            <div>
                        <img src='../views/assets/graph.svg' alt='graph'/>
                        Humidité</div></a>

                          <a href='./datas?productId=<?php echo $product['id']?>&type=carbon_dioxide'>
                          <div>
              <img src='../views/assets/graph.svg' alt='graph'/>
CO2</div>
                </a>

                          <a href='./datas?productId=<?php echo $product['id']?>&type=sound_level'>
                          <div>
               <img src='../views/assets/graph.svg' alt='graph'/>
Signal Sonore</div></a>

            </div>
        </section>
<?php      } ?>
    </main>
    <!-- Footer -->
    <?php require 'views/components/footer.php'; ?>
</body>
</html>
