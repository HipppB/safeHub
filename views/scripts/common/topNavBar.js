let isMenuShown = false
function toggleBurgerMenu() {
    console.log('hey')
    isMenuShown = !isMenuShown
    const burgerMenu = document.getElementsByClassName('topNavBar-burgerMenu')
    if (burgerMenu.length > 0) {
        burgerMenu[0].classList.toggle('topNavBar-burgerMenu--shown')
    }
}
function addNavBar() {
    const topNavBar = document.getElementsByTagName('body')
    console.log(topNavBar)
    topNavBar[0].innerHTML = html + topNavBar[0].innerHTML
}

const html = `
<div class="topNavBar-container">
    <div class="topNavBar-burgerMenu" onclick="toggleBurgerMenu()">
        <img src="./assets/icons/burgerIcon.svg" />
        <div class="topNavBar-burgerMenu-content-container"></div>
    </div>
    <a class="link" href="./faq.html">FAQ</a>
    <a class="link" href="./contact.html">CONTACT</a>
    <div class="topNavBar-logo-container">
        <img class="topNavBar-logo" src="./assets/logo.svg" alt="logo" />
    </div>
    <a class="link" href="./connexion.html">CONNEXION</a>
    <div class="langage-selector">
        <img src="./assets/frenchFlag.png" class="langage-selector__flag" />

        <div class="langage-selector__text">FR</div>
        <img
            class="langage-selector__arrow"
            src="./assets/icons/arrowDown.svg"
        />
    </div>
</div>
`

addNavBar()
