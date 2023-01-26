<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../views/styles/common/index.css" />
    <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
    <link rel="stylesheet" href="../views/styles/dashboard.css" />

    <script
        type="text/javascript"
        src="../views/scripts/common/components.js"
        defer
    ></script>
    
</head>

<body>


<?php if (isset($notfirst) && $notfirst == true) {
    require 'views/components/headerPrivate.php';
} else {
    require 'views/components/headerPrivate.php';
} ?>

<main>
    <div id="text">
        <?php if (!isset($notfirst)) { ?>

        
        <p><?php printTranslation('noProductOnAccount'); ?></p>
        <hr />
        <?php } ?>
        <p>
        <?php printTranslation('addProductInstruction'); ?>
        </p>
    </div>

    <form method="POST" id='form'>
        <div
            class="input-label-container"
            name="productUserCode"
            placeholder="<?php printTranslation('ProductCode'); ?>"
            path=""

        ></div>
        <?php if (!empty($error) && $error == 401) {
            echo "<p class='error center'>" .
                printTranslation('IncorrectCode', true) .
                '</p>';
        } ?>
        <input type="submit" class="button mT25 mB25" value=" <?php printTranslation(
            'add'
        ); ?>" />
    </form>
</main>
<!-- Footer -->
<?php require 'views/components/footer.php'; ?>
</html>

