<div class="topNavBar-container" >
    <div class="topNavBar-container-items">
        <div class="topNavBar-burgerMenu">
            <img
                src="../views/assets/icons/burgerIcon.svg"
                onclick="toggleBurgerMenu()"
            />
        </div>
        <a class="link" href="./faq">FAQ</a>
        <a class="link" href="./contact">CONTACT</a>
        <div class="topNavBar-logo-container">
            <img
                class="topNavBar-logo"
                src="../views/assets/logo.svg"
                alt="logo"
                onclick="window.location.href = './';"
            />
        </div>
        <a class="link" href="./connexion">
        <?php echo isset($_SESSION['user'])
            ? 'DASHBOARD'
            : printTranslation('CONNEXION', true); ?>
            <?php  ?></a>
        <div class="langage-selector" onclick="toggleLangages()">
        <?php echo $_SESSION['lang'] == 'en'
            ? '<img
            src="../views/assets/englishFlag.png"
            class="langage-selector__flag"
        />'
            : '<img
        src="../views/assets/frenchFlag.png"
        class="langage-selector__flag"
    />'; ?>
            <div class="langage-selector__text"><?php echo $_SESSION['lang'] ==
            'en'
                ? 'EN'
                : 'FR'; ?>
            </div>
            <img
                class="langage-selector__arrow"
                src="../views/assets/icons/arrowDown.svg"
            />
            <div class="langage-selector-content-container">
                <div class="langage-selector-content-container__item" onclick="onClickLangage('fr')">
                    <img
                        src="../views/assets/frenchFlag.png"
                        class="langage-selector__flag"
                    />
                    <div class="langage-selector__text">FR</div>
                </div>
                <div class="langage-selector-content-container__item" onclick="onClickLangage('en')">
                    <img
                        src="../views/assets/englishFlag.png"
                        class="langage-selector__flag"
                    />
                    <div class="langage-selector__text">EN</div>
                </div>
            </div>
        </div>
    </div>
    <div class="topNavBar-burgerMenu-content-container">
        <div class="link-Burger">
            <a href="./index">Accueil</a>
        </div>
        <div class="lineHeader"></div>
        <div class="link-Burger">
            <a href="./faq">FAQ</a>
        </div>
        <div class="lineHeader"></div>
        <div class="link-Burger">
            <a href="./contact">Contact</a>
        </div>
        <div class="lineHeader"></div>
        <div class="link-Burger">
            <a href="./Connexion"><?php echo isset($_SESSION['user'])
                ? 'Dashboard'
                : 'Connexion'; ?></a>
        </div>
    </div>
</div>
<div style="margin-bottom: 30px;"></div>
