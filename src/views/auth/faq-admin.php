<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Foire aux questions</title>
        <link rel="stylesheet" href="../views/styles/common/index.css" />
        <link rel="stylesheet" href="../views/styles/faq.css" />
        <link rel="stylesheet" href="../views/styles/headerprivate.css" />
 
        <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div
            class="header-container"
            title="Modifier FAQ"
            leftButtonPath="../views/assets/icons/backButton.svg"
        ></div>

        <div class="faq-container">
            <p class=" titleFAQ">Ajouter questions/réponses</p>
            <div>
                <form method="post">
                    <div
                    class="input-label-container mT15"
                    type="text"
                    name="question"
                    placeholder="Question..."
                    ></div>
                    <div
                    class="input-label-container mT15"
                    type="text"
                    name="reponse"
                        multiline="true"
                        placeholder="Réponse..."
                    ></div>
                    <input
                        type="submit"
                        class="button mT10"
                        name="ajouter"
                        value="Ajouter"
                    />
                </form>
                <div>
                    <?php if ($retour) {
                        echo '<div class="titleFAQ"> FAQ ajoutée avec succès </div>';
                    } ?>
                </div>
            </div>
           
        <p class="gradienttext titleFAQ s1 mT25 mL20">liste des questions/réponses</p>
        
    <?php foreach ($faqs as $faq) { ?> <br>
            
            <div class="question-container">
                <div class="faqText">
                    <p class="titleFAQ">
                        <?php echo $faq['question']; ?>
                    </p>

                    <p  class="paragraphFAQ"><?php echo $faq['reponse']; ?>
                    
                        </p>
                </div>
                <div class="faqIcon">
                    <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <line
                            y1="-0.5"
                            x2="20.6625"
                            y2="-0.5"
                            transform="matrix(0.725953 0.687745 -0.725953 0.687745 0 0.789429)"
                            stroke="red"
                        />
                        <line
                            y1="-0.5"
                            x2="21.2132"
                            y2="-0.5"
                            transform="matrix(-0.707107 0.707107 -0.744216 -0.667939 15 0)"
                            stroke="red"
                        />
                    </svg>
                    <svg
                        width="17"
                        height="17"
                        viewBox="0 0 17 17"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M12.6952 16.4653H2.17118C1.59556 16.4646 1.04373 16.2356 0.636705 15.8285C0.229683 15.4213 0.000706928 14.8694 0 14.2936V3.76695C0.000706928 3.19119 0.229683 2.63921 0.636705 2.23208C1.04373 1.82496 1.59556 1.59592 2.17118 1.59521H7.43317C7.61029 1.59521 7.78016 1.6656 7.90541 1.79087C8.03065 1.91615 8.10102 2.08606 8.10102 2.26323C8.10102 2.4404 8.03065 2.61032 7.90541 2.7356C7.78016 2.86087 7.61029 2.93125 7.43317 2.93125H2.17118C1.9497 2.93161 1.7374 3.01977 1.5808 3.17641C1.42419 3.33306 1.33605 3.54542 1.3357 3.76695V14.2936C1.33605 14.5151 1.42419 14.7275 1.5808 14.8841C1.7374 15.0408 1.9497 15.1289 2.17118 15.1293H12.6952C12.9166 15.1289 13.1289 15.0408 13.2855 14.8841C13.4421 14.7275 13.5303 14.5151 13.5306 14.2936V9.03027C13.5306 8.8531 13.601 8.68319 13.7262 8.55791C13.8515 8.43264 14.0214 8.36226 14.1985 8.36226C14.3756 8.36226 14.5455 8.43264 14.6707 8.55791C14.796 8.68319 14.8663 8.8531 14.8663 9.03027V14.2936C14.8656 14.8694 14.6367 15.4213 14.2296 15.8285C13.8226 16.2356 13.2708 16.4646 12.6952 16.4653Z"
                            fill="#747474"
                        />
                        <path
                            d="M14.1985 9.45097e-06C14.6456 0.000583899 15.0826 0.133656 15.4541 0.382426C15.8257 0.631196 16.1153 0.98451 16.2863 1.39776C16.4573 1.81101 16.502 2.26568 16.4149 2.70435C16.3277 3.14302 16.1126 3.54603 15.7967 3.8625L8.65668 11.0063C8.57101 11.092 8.46366 11.1527 8.34613 11.182L5.34081 11.9342C5.22884 11.9624 5.11148 11.961 5.00019 11.9303C4.88889 11.8996 4.78746 11.8405 4.70578 11.7589C4.62411 11.6773 4.56499 11.5759 4.53418 11.4646C4.50338 11.3533 4.50195 11.2359 4.53004 11.1239L5.28204 8.11779C5.31134 8.00023 5.37205 7.89285 5.45768 7.80716L12.5983 0.662685C12.808 0.451882 13.0574 0.28477 13.332 0.171021C13.6067 0.0572728 13.9012 -0.000852649 14.1985 9.45097e-06ZM7.84324 9.93079L14.8557 2.91658C14.9417 2.83048 15.01 2.72826 15.0566 2.61576C15.1032 2.50327 15.1272 2.38269 15.1272 2.26092C15.1272 2.13915 15.1032 2.01858 15.0566 1.90608C15.01 1.79358 14.9417 1.69136 14.8557 1.60526C14.7696 1.51916 14.6674 1.45086 14.5549 1.40426C14.4424 1.35766 14.3219 1.33368 14.2002 1.33368C14.0784 1.33368 13.9579 1.35766 13.8454 1.40426C13.7329 1.45086 13.6308 1.51916 13.5447 1.60526L6.53225 8.61947L6.09548 10.3677L7.84324 9.93079Z"
                            fill="#747474"
                        /> 
                    </svg>
                </div>
            </div>
    <?php } ?>
        </div>
        

        <div class="footer-container" small="true"></div>
    </body>
</html>
