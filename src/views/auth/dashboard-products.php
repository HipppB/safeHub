<?php

/** @var array $products */

?>


<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <title>Dashboard - Liste des produits</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel='stylesheet' href='../views/styles/common/index.css'>
  <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
  <link rel="stylesheet" href="../views/styles/dashboard-products.css" />
  <script type='text/javascript' src='../views/scripts/common/components.js' async></script>
</head>
<body>


<?php require 'views/components/headerPrivate.php'; ?>

    <main>

      <?php foreach ($products as $product) {
          echo "
          <section>
            <header>
              <img src='../views/assets/icons/homeInline.svg' alt='house'>
              <h2 class='gradienttext'>" .
              $product['product_name'] .
              ' (' .
              $product['room_name'] .
              ")</h2>
            </header>
            <div class='graphList'>
            <a href='./datas'>
            <div>
               <img src='../views/assets/graph.svg' alt='graph'/>
             Température</div>
</a>

                            <a href='./datas'>
                            <div>
                        <img src='../views/assets/graph.svg' alt='graph'/>
                        Humidité</div></a>
           
                          <a href='./datas'>
                          <div>
              <img src='../views/assets/graph.svg' alt='graph'/>
CO2</div>
                </a>

                          <a href='./datas'>
                          <div>
               <img src='../views/assets/graph.svg' alt='graph'/>
Signal Sonore</div></a>
             
            </div>
        </section>
        ";
      } ?>
    </main>
    <!-- Footer -->
    <div class="footer-container" small="true"></div>
</body>
</html>
