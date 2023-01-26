<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Modifier produit</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/modifyProduct.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            defer
            async
        ></script>
        <script type="text/javascript" src="../views/scripts/product.js" async></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    <?php require 'views/components/headerPrivate.php'; ?>
    <div class="title-container">
        <h1 class="title gradienttext"><?php printTranslation('modifyProduct') ?></h1>
    </div>
    <form method='post'>
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    name="name"
                    placeholder="<?php printTranslation('productName'); ?>"
                    path="../views/assets/icons/person.svg"
                    value='<?php echo $product['product_name']; ?>'
                ></div>
                <div
                    class="input-label-container"
                    name="accomodationName"
                    placeholder="<?php printTranslation('accomodationName'); ?>"
                    path="../views/assets/icons/house.svg"
                    value='<?php echo $product['house_name']; ?>'
                ></div>
                <div
                    class="input-label-container"
                    name="roomName"
                    placeholder="<?php printTranslation('roomName'); ?>"
                    path="../views/assets/icons/house.svg"
                    value='<?php echo $product['room_name']; ?>'
                ></div>
                <div
                    class="input-label-container"
                    name="productCode"
                    placeholder="<?php printTranslation('productCode'); ?>"
                    path="../views/assets/icons/mail.svg"
                    value='<?php echo $product['product_code']; ?>'
                ></div>
                <div
                    class="input-label-container"
                    name="userCode"
                    placeholder="<?php printTranslation('userCode'); ?>"
                    path="../views/assets/icons/mail.svg"
                    value='<?php echo $product['user_code']; ?>'
                ></div>
                <div
                    class="input-label-container"
                    name="userCodeExpirationDate"
                    placeholder="<?php printTranslation('userCodeExpiration'); ?>"
                    path="../views/assets/icons/calendar.svg"
                    value='<?php echo $product['expiration_date']; ?>'
                ></div>
                <div
                    class="input-label-container"
                    name="comments"
                    placeholder="Commentaire"
                    path="../views/assets/icons/modify.svg"
                    placeholder="<?php printTranslation('comments'); ?>"
                    multiline='true'
                ></div>
                <?php if (isset($response)) {
                    if($response) {
                        echo '<div class="error">';
                        printTranslation('productModified');
                        echo '</div>';
                    }else {
                        echo '<div class="error">';
                        printTranslation("error");
                        echo '</div>';
                    }
                } ?>

                <input type="submit" class="button mT25" value="Valider" />
            </div>

        </form>
            <button class="button-outlined mT10">
                Reset les données produit
            </button>
            <button class="button-outlined-red mT20 mB50" onclick="deleteProduct(<?php echo $product[
            'id'
            ]; ?>)">
                Supprimer le produit
            </button>
        <!-- Footer -->
    <?php require 'views/components/footer.php'; ?>    </body>
    </body>
</html>
