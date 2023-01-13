<div class="footer-container">
    <p class="gradienttext mT10">Crée par AllSafe - Copyright 2022</p>
    <?php if (strpos($_SERVER['REQUEST_URI'], 'panel') == false) {
        echo '<div class="line mT25"></div>';

        echo '<a href="../cgu">Conditions générales \'utilisation</a>
            <a href="../mentionslegales">Mentions légales</a>
            <a href="../faq">FAQ</a>
            <a href="../contact">Contact</a>';
    } ?>
</div>