# COMPOSANTS DU PROJET

Afin de facilier le développement de la partie HTML du projet plusieurs "composants" ont étés crées.
<br>Ils consistent en des balises HTML custom ou du CSS réutilisables plus facilement.
<br>Les différents composants sont par défaut responsive (ou respectent certains critères, comme 80% de l'espace du parent pour les inputs)
<br>Vous pouvez rajouter des classes de styles sur les composants, vous n'avez cependant la plupart du temps que accès au contenaire du composant (Le reste étant rempli automatiquement)

---

## Boutons

Le texte à l'interieur des boutons est customisable en rajoutant une balise ou une deuxième classe dans la base button

### Normal

Fichier css : `common/index.css`

    <button class="button">
        Texte
    </button>

### Outlined

Fichier css : `common/index.css`

    <button class="button-outlined">
        Texte
    </button>

---

## Footer

Fichiers css :
`common/index.css`
, `common/topNavBar.css`<br>

### Pages publiques

            <div class="footer-container"></div>

### Pages privées

            <div class="footer-container" small="true"></div>

## Entêtes

### Pages publiques, avec navigation

Fichiers css :
`common/index.css`
, `common/topNavBar.css`<br>

Importation en php :

    <?php require 'views/components/header.php'; ?>

### Page authentifiés, Bouton Retour (Optionnel) - Titre - Bouton (Optionel)

les attributs width et heigth sont appliqués sur l'icone de droite, celui de gauche prend toujours le style du bouton retour<br><br>
Fichiers css :
`common/index.css`, `common/headerPrivate.css`<br>
Fichier script :
`common/component.js`

    <div
        class="header-container"
        title=""
        leftButtonPath=""

    >
    </div>

---

## Entrées utilisateurs

Pour l'instant seul l'entrée de base est disponible, d'autres viendront par la suite.

### Entrée simple

    <div
        class="input-label-container"
        type=""
        name=""
        placeholder=""
        path="./assets/icons/lock.svg"
    ></div>
