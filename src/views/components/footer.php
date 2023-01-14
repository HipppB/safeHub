<div class="footer-container">
    <?php if (strpos($_SERVER['REQUEST_URI'], 'panel') == false) {
        echo '<a href="../cgu">' .
            printTranslation('terms', true) .
            '</a>
            <a href="../mentionslegales">' .
            printTranslation('legal', true) .
            '</a>
            <a href="../faq">FAQ</a>
            <a href="../contact">Contact</a>';
        echo '<div class="line mT25"></div>';
    } ?>
        <p class="gradienttext mT10"><?php printTranslation(
            'createby'
        ); ?> AllSafe - Copyright 2022</p>

</div>