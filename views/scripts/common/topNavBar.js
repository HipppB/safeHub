let isMenuShown = false
function toggleBurgerMenu() {
    console.log('hey')
    isMenuShown = !isMenuShown
    const burgerMenu = document.getElementsByClassName('topNavBar-burgerMenu')
    if (burgerMenu.length > 0) {
        burgerMenu[0].classList.toggle('topNavBar-burgerMenu--shown')
    }
}
