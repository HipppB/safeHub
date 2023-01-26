<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Conseils Admin</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
        <link rel="stylesheet" href="../views/styles/conseilsAdmin.css" />
        
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
defer            async
        ></script>
        <script
            type="text/javascript"
            src="../views/scripts/conseilsAdmin.js"
            async> </script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div
            class="header-container"
            title="Conseils"
            leftButtonPath="../views/assets/icons/backButton.svg"
            width="25px"
        ></div>

        <div class="conseils-container">
            <div>
                <p class="conseilsTitle"><?php printTranslation(
                    'add-question-answer'
                ); ?></p>
                <form id="add-tips-form">
                    <div
                        class="input-label-container"
                        name="search"
                        multiline="true"
                        placeholderInside="Conseil..."
                    ></div>
                    <div class="flex center mT25">
                        <input type="checkbox" class="bgred" name="isEnglish"></input>
                        <div class="flex vcenter center s025 mL10">Conseil en anglais</div>
                    </div>
                    <input type="submit" class="button mT25" value="Ajouter"/>
                </form>
            </div>

            <div class="mT50">
                <p class="conseilsTitle"><?php printTranslation(
                    'tips-list'
                ); ?></p>
                <div class="line"></div>
                <div id='listConseil'>
                <?php foreach ($tips as $tip) {
                    echo "<div id='conseilListContainer'>
                    <div class='iconParagraph mB25'>
                        <p class='conseilsParagraph'>" .
                        $tip['content'] .
                        "</p>
                        <img src='../views/assets/icons/close.svg' id='deleteBtn' onClick='deleteTips(" .
                        $tip['id'] .
                        ")'/>
                    </div>
                    <div class='line'></div>
                </div>";
                } ?>
                </div>
            </div>
        </div>

    
        <!-- Footer -->
    <?php require 'views/components/footer.php'; ?>
    </body>
</html>
