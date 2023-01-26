<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - <?php printTranslation('faq'); ?></title>
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link rel="stylesheet" href="views/styles/faq.css" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            defer
        ></script>
        <script
            type="text/javascript"
            src="views/scripts/searchFaq.js"
            defer
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <?php require 'views/components/header.php'; ?>
        <div class="faq-container">
            <div class="">
                <p class="gradienttext title mT50">FAQ</p>
            </div>
            <div class="mT15 mB25">
                <div
                    class="input-label-container"
                    name="search"
                    path=""
                    placeholderInside="<?php printTranslation('search'); ?>"
                ></div>
            </div>
            <div class="mR25 faqListContainer" id="faqListContainer">
                <?php foreach ($faq as $question) { ?>
                    <div>
                        <p class="gradienttext titleFAQ">
                            <?php echo $question['question']; ?>
                        </p>
                        <p class="paragraphFAQ mT10">
                            <?php echo $question['reponse']; ?>
                        </p>
                        <div class="line mT50"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Footer -->
        <?php require 'views/components/footer.php'; ?>

    </body>
</html>
