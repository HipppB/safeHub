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
        <?php require 'views/components/productListing.php'; ?>

      <?php } ?>
    </main>
    <!-- Footer -->
    <?php require 'views/components/footer.php'; ?>
</body>
</html>
