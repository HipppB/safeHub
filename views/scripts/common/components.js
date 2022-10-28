/* Importing this file will add the following components to the pages :
- Header Public Pages
<div class="topNavBar-container"></div>
css : 
    <link rel="stylesheet" href="./styles/common/topNavBar.css" />


- Header with Pptional button - Title - Optional button
<div class="header-container" title="" leftButtonPath="" rightButtonPath="" leftAction="" rightAction=""/>

css :
    <link rel="stylesheet" href="./styles/headerprivate.css" />

- TextInputs
<div class="input-label-container"
     type=""
     name=""
     placeholder=""
     path="">
</div>

*/

const inputHTML = `
<label for="{name}">{placeholder}</label><div class="input-container"><input type="{type}" name="{name}" /><img src="{path}" /></div>
`

const headerHTML = `
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
`
const headerTitleButton = `
        <div class="icon-container">
            <img
                src="{leftButtonPath}"
                alt=""
            />
        </div>

            <h1 class="title gradienttext">{title}</h1>

        <div class="icon-container">
            <img
                src="{rightButtonPath}"
                alt=""
                style="width:{width}; height: {height};"
            />
        </div>
`
function searchForInputs() {
    const inputs = document.querySelectorAll('.input-label-container')

    inputs.forEach((input) => {
        const newInput = inputHTML
        const type = input.getAttribute('type')
        const name = input.getAttribute('name')
        const placeholder = input.getAttribute('placeholder')
        const path = input.getAttribute('path')

        input.innerHTML = inputHTML
            .replace('{type}', type)
            .replace('{name}', name)
            .replace('{placeholder}', placeholder)
            .replace('{path}', path)
    })
    console.log(inputs)
}

function searchForNavBar() {
    const navBar = document.querySelectorAll('.topNavBar-container')
    navBar.forEach((navBar) => {
        navBar.innerHTML = headerHTML
    })
}

function searchForHeader() {
    const header = document.querySelectorAll('.header-container')
    header.forEach((header) => {
        const title = header.getAttribute('title')
        const leftButtonPath = header.getAttribute('leftButtonPath')
        const rightButtonPath = header.getAttribute('rightButtonPath')
        const leftAction = header.getAttribute('leftAction')
        const rightAction = header.getAttribute('rightAction')
        const height = header.getAttribute('height')
        const width = header.getAttribute('width')
        header.innerHTML = headerTitleButton
            .replace('{title}', title)
            .replace('{leftButtonPath}', leftButtonPath)
            .replace('{rightButtonPath}', rightButtonPath)
            .replace('{height}', height)
            .replace('{width}', width)
    })
}
searchForInputs()
searchForNavBar()
searchForHeader()
