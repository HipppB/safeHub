<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <link rel="stylesheet" href="../views/styles/faq.css" />

        <!-- <link rel="stylesheet" href="../views/styles/ticketuser.css" /> -->
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
defer            async
        ></script>
        <title>SafeHub - Ticket Utilisateur</title>
    </head>
    <body>
        <?php require 'views/components/headerprivate.php'; ?>
        <div class="faq-container">
            <div class="">
                <p class="gradienttext title mT50"><?php printTranslation(
                    'New ticket'
                ); ?></p>
            </div>
            <div class="mT15 mB25">
              
                <div
                class="input-label-container"
                type=""
                name=""
                placeholderInside="<?php printTranslation('Object'); ?>"
                placeholder=""  
                path=""
            ></div>
            <div
                class="input-label-container"
                type=""
                name=""
                multiline="true"
                placeholderInside="<?php printTranslation(
                    'What is happening ?'
                ); ?>"
                placeholder=""  
                path=""
            ></div> 
            <bouton class="button mT15">    
                    <?php printTranslation('send'); ?>
                </bouton>
            </div>
            <div class="mR25 faqListContainer">
                <div>
                    <p class="gradienttext titleFAQ"><?php printTranslation(
                        'What is a ticket'
                    ); ?></p>
                    <p class="paragraphFAQ mT10">
                    <?php printTranslation('What is a ticketText'); ?>
                    </p>
                    <div class="line mT50"></div>
                </div>
            </div>
        </div>
        <?php require 'views/components/footer.php'; ?>

            
    </body>
</html>
