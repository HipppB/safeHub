<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <title>Dashboard - Liste des produits</title>
  <link rel='stylesheet' href='../views/styles/common/index.css'>
  <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
  <link rel="stylesheet" href="../views/styles/dashboard-products.css" />
  <script type='text/javascript' src='../views/scripts/common/components.js' async></script>
  <meta name='viewport' content='width=device-width'>
</head>
<body>

<div class='header-container' title='Dashboard' leftButtonPath='../views/assets/icons/backButton.svg'
     rightButtonPath="../views/assets/icons/person.svg"
     rightAction="window.location.href = './profile';"

></div>

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
              <img src='../views/assets/graph.svg' alt='graph'/>
              <img src='../views/assets/graph.svg' alt='graph'/>
              <img src='../views/assets/graph.svg' alt='graph'/>
              <img src='../views/assets/graph.svg' alt='graph'/>
            </div>
        </section>
        ";
      } ?>
    </main>
    <!-- Footer -->
    <div class="footer-container" small="true"></div>
</body>
</html>
