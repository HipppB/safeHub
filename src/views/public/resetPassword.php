<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - <?php printTranslation('resetPassword'); ?></title>
        <link rel="stylesheet" href="views/styles/identificationPagesStyles.css" />

        <link rel="stylesheet" href="views/styles/common/index.css" />

        <link rel="stylesheet" href="views/styles/forgotPassword.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            defer
        ></script>
        <script type="text/javascript" src="views/scripts/resetPassword.js" async></script>

    </head>
    <body>
    <?php require 'views/components/header.php'; ?>
        <img src="views/assets/hex_reset.svg" class="blob" />
        <div class="authentificationPageContainer">
            <div class='title-blob-container'>
        <div class="title-container">

            <h1 class="title gradienttext"><?php printTranslation(
                'resetPassword'
            ); ?></h1>
            <p class="subtitle"><?php printTranslation(
                'enterNewPassword'
            ); ?>&nbsp!</p>
            </div>
        <div class="illu-container">
            <img src="views/assets/form_reset.svg" class="illu" />
        </div>
        </div>
        <form method="post" id="reset_form">
            <div class="input-list-container">
                <div
                    class="input-label-container"
                    type="password"
                    name="password"
                    placeholder="<?php printTranslation('password'); ?>"
                    path="views/assets/icons/lock.svg"
                    value="<?php echo $password; ?>"
                ></div>
                <span class='error-block'></span>

                <div
                    class="input-label-container"
                    type="password"
                    name="confirmPassword"
                    value="<?php echo $confirmPassword; ?>"
                    placeholder="<?php printTranslation('confirmPassword'); ?>"
                    path="views/assets/icons/lock.svg"
                ></div>
                <span class='error-block'></span>

            </div>
            <?php if(!empty($response)){
                echo "<p class='error'>$response</p>";
            } ?>

            <input type="submit" class="button mT25" value="<?php printTranslation(
                'reset'
            ); ?>" name="submit"/>
        </form>
        </div>
    <div class="mT50"></div>
    <!-- Footer -->
    <?php require 'views/components/footer.php'; ?>
    </body>
</html>
