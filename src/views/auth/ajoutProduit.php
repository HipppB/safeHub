<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Ajout produit</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/common/classStyles.css" />
        <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
        <link rel="stylesheet" href="../views/styles/ajoutProduit.css" />

        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            defer
            async
        ></script>
<!--        <script type="text/javascript" src="../views/scripts/product.js" async></script>-->
        <meta name="viewport" content="width=device-width, initial-scale=1" />

    </head>

    <body>
    <?php require 'views/components/headerPrivate.php'; ?>
    <div class="title-container">
        <h1 class="title gradienttext"><?php printTranslation('addProduct') ?></h1>
    </div>


    <form method="post" id='product_form'>
        <div class="input-list-container">
                <div
                    class="input-label-container"
                    type="text"
                    name="name"
                    placeholder="<?php printTranslation('productName'); ?>"
                    path="../views/assets/icons/person.svg"
                    value='<?php echo $name; ?>'
                ></div>
            <span class='error-block'></span>

            <div
                    class="input-label-container"
                    type="text"
                    name="accomodationName"
                    placeholder="<?php printTranslation('accomodationName'); ?>"
                    path="../views/assets/icons/house.svg"
                    value='<?php echo $accomodationName; ?>'
                ></div>
            <span class='error-block'></span>

            <div
                value = '<?php echo $roomName; ?>'
                    class="input-label-container"
                    type="text"
                    name="roomName"
                    placeholder="<?php printTranslation('roomName'); ?>"
                    path="../views/assets/icons/house.svg"
                ></div>
            <span class='error-block'></span>

            <div
                value='<?php echo $productCode; ?>'
                    class="input-label-container"
                    name="productCode"
                    placeholder="<?php printTranslation('productCode'); ?>"
                    path="../views/assets/icons/mail.svg"
                ></div>
            <span class='error-block'></span>

            <div
                value='<?php echo $userCode; ?>'
                    class="input-label-container"
                    name="userCode"
                    placeholder="<?php printTranslation('userCode'); ?>"
                    path="../views/assets/icons/mail.svg"
                ></div>
            <span class='error-block'></span>


            <div
                value='<?php echo $userExpirationDate; ?>'
                    class="input-label-container"
                    type="date"
                    name="userCodeExpirationDate"
                    placeholder="<?php printTranslation('userCodeExpiration'); ?>"
                    path="../views/assets/icons/calendar.svg"
                ></div>
            <span class='error-block'></span>

            <div
                value='<?php echo $comments; ?>'
                    class="input-label-container comments"
                    multiline="true"
                    name="comments"
                    placeholder="<?php printTranslation('comments'); ?>"
                ></div>

            <?php if (isset($response)) {
                if($response === "productAlreadyExists"){
                    echo '<div class="error">';
                    printTranslation('productAlreadyExists');
                    echo '</div>';
                } else if($response) {
                    echo '<div class="error">';
                    printTranslation('productAdded');
                    echo '</div>';
                }else {
                    echo '<div class="error">';
                    printTranslation("error");
                    echo '</div>';
                }
            } ?>

                <input class="button" type="submit" value="<?php printTranslation("addProductButton") ?>"/>
            </div>
    </form>
    <!-- Footer -->
    <?php require 'views/components/footer.php'; ?>    </body>
</html>
