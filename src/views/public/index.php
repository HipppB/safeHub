<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SafeHub - Page d'accueil</title>
        <link rel="stylesheet" href="views/styles/common/index.css" />
        <link rel="stylesheet" href="views/styles/accueil.css" />
        <script
            type="text/javascript"
            src="views/scripts/common/components.js"
            async
        ></script>
        <script
            type="text/javascript"
            src="views/scripts/carousel.js"
            async
        ></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div class="home-container">
            <!-- Hero section -->
            <?php require 'views/components/header.php'; ?>

            <div class="home-title-container mL25 mR25">
                <div class="title-container">
                    <h1 class="gradienttext">Domotic for your safety</h1>
                    <p class="home-subtitle">
                        <?php printTranslation('home_subtitle'); ?>
                       <br />
                       <?php printTranslation('home_sub2'); ?>
                    </p>
                    <a href="./connexion" class="outline-button mT100"
                        ><?php echo $isConnected
                            ? 'DASHBOARD'
                            : printTranslation('connect', true); ?></a
                    >
                </div>
                <div>

                        <img src="views/assets/home_blob.svg" class="blob" />

                    <img
                        src="views/assets/home_image.svg"
                        class=" homeImage"
                    />
                </div>
            </div>

            <!-- Nos services -->
            <div class="ourService mT150">
                <h1 class="gradienttext"><?php printTranslation(
                    'ourservices'
                ); ?></h1>
                <p class="home-subtitle-categories">
                <?php printTranslation('innovative-product'); ?>
                </p>
                <div class="images-section mT50">
                    <div class="images-container">
                        <img
                            src="views/assets/imagePlaceholder.jpg"
                            class="verticalImage"
                        />
                        <div class="mL10">
                            <img
                                src="views/assets/imagePlaceholder.jpg"
                                class="horizontalImage"
                            /><img
                                src="views/assets/imagePlaceholder.jpg"
                                class="horizontalImage"
                            />
                        </div>
                    </div>
                </div>
                <img src="views/assets/home_blob2.svg" class="blob2" />
                <div class="servicePoints mT50">
                    <div class="servicePoint">
                        <img src="views/assets/icons/homeInline.svg" class="" />
                        <div class="mL20">
                            <p class="serviceTitle gradienttext"><?php printTranslation(
                                'security'
                            ); ?></p>
                            <p class="serviceParagraph">
                            <?php printTranslation('security-desc'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="servicePoint">
                        <img src="views/assets/icons/homeInline.svg" class="" />
                        <div class="mL20">
                            <p class="serviceTitle gradienttext"><?php printTranslation(
                                'fiability'
                            ); ?></p>
                            <p class="serviceParagraph">
                            <?php printTranslation('fiability-desc'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="servicePoint">
                        <img src="views/assets/icons/homeInline.svg" class="" />
                        <div class="mL20">
                            <p class="serviceTitle gradienttext"><?php printTranslation(
                                'serenity'
                            ); ?></p>
                            <p class="serviceParagraph">
                            <?php printTranslation('serenity-desc'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <img src="views/assets/home_blob3.svg" class="blob3" />
                <img src="views/assets/home_blob4.svg" class="blob4" />
            </div>

            <!-- Temoignages -->
            <div class="testimonies mT150">
                <img src="views/assets/home_blob5.svg" class="blob5" />
                <h1 class="title gradienttext"><?php printTranslation(
                    'testimonials'
                ); ?></h1>
                <p class="home-subtitle-categories">
                <?php printTranslation('testimonials-desc'); ?>
                </p>

                <div class="carousel-container mT50 mB200">
                    <div class="carousel-buttons">
                            <svg
                                width="9"
                                height="16"
                                viewBox="0 0 9 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="carousel-button carousel-button-previous"
                            
                            >
                                <path
                                    d="M8 15L1 8L8 1"
                                    stroke="#f76b1c"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <svg
                                width="9"
                                height="16"
                                viewBox="0 0 9 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="carousel-button carousel-button-next"
                            >
                                <path
                                    d="M1 1L8 8L1 15"
                                    stroke="#fad961"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                    </div>
                    <div class="slides" data-carousel-slides-container>
                        <div class="slide">
                            <p class="gradienttext">
                            <?php printTranslation('testimonials-desc2'); ?>
                            </p>
                            <div class="profil-container">
                                <img
                                    src="views/assets/image-profile.png"
                                    class="profil-image"
                                />
                                <div class="name-job">
                                    <p class="name gradienttext">John Doe</p>
                                    <p><?php printTranslation(
                                        'job-engineer'
                                    ); ?></p>
                                </div>
                            </div>
                                </div>
                        </div>
                </div>
            </div>
            <?php require 'views/components/footer.php'; ?>

        </div>
        <!-- Footer -->
        </body>

</html>


<!-- <div class="slide active">
                            <p class="gradienttext">
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.
                            </p>
                            <div class="profil-container">
                                <img
                                    src="views/assets/image-profile.png"
                                    class="profil-image"
                                />
                                <div class="name-job">
                                    <p class="name gradienttext">John Doe</p>
                                    <p>Ingénieur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    Footer -->
<!--        <div class="footer-container" small="false"></div>-->
<!--    </body>-->
<!--</html>-->