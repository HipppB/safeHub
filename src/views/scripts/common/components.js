/* Importing this file will add the following components to the pages :
- Header Public Pages
<div class="topNavBar-container"></div>
css : 
    <link rel="stylesheet" href="./styles/common/topNavBar.css" />


- Header with Optional button - Title - Optional button
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
<label for="{name}">{placeholder}</label>
    <div class="input-container">
        <input type="{type}" name="{name}" placeholder="{placeholderInside}"/>
        <img src="{path}" />
    </div>
`
const inputTextAreaHTML = `
<label for="{name}">{placeholder}</label>
    <div class="input-container">
        <textarea rows="5" type="{type}" name="{name}" placeholder="{placeholderInside}"></textarea>
        <img src="{path}" />
    </div>
`

const headerHTML = `
<div class="topNavBar-container-items">
    <div class="topNavBar-burgerMenu" >
        <img src="../assets/icons/burgerIcon.svg" onclick="toggleBurgerMenu()"/>
    </div>
    <a class="link" href="./faq.html">FAQ</a>
    <a class="link" href="./contact.html">CONTACT</a>
    <div class="topNavBar-logo-container">
        <img class="topNavBar-logo" src="../assets/logo.svg" alt="logo" onclick="window.location.href = './';"/>
    </div>
    <a class="link" href="./connexion.html">CONNEXION</a>
    <div class="langage-selector" onclick="toggleLangages()"    >
        <img src="../assets/frenchFlag.png" class="langage-selector__flag" />
        <div class="langage-selector__text">FR</div>
        <img
            class="langage-selector__arrow"
            src="../assets/icons/arrowDown.svg"
        />
        <div class="langage-selector-content-container">
            
            <div class="langage-selector-content-container__item">
                <img src="../assets/frenchFlag.png" class="langage-selector__flag" />
                <div class="langage-selector__text">FR</div>
            </div>
            <div class="langage-selector-content-container__item">
            <img src="../assets/englishFlag.png" class="langage-selector__flag" />
            <div class="langage-selector__text">EN</div>
        </div>
        </div>
    </div>
    
</div>
<div class="topNavBar-burgerMenu-content-container">
    <div class="link-Burger">
        <a href="./index.html">Accueil</a>
    </div>
    <div class="lineHeader"></div>
    <div class="link-Burger">
        <a href="./faq.html">FAQ</a>
    </div>
    <div class="lineHeader"></div>
    <div class="link-Burger">
        <a  href="./contact.html">Contact</a>
    </div>
    <div class="lineHeader"></div>
    <div class="link-Burger">
        <a href="./Connexion.html">Connexion</a>
    </div> 
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

const footerLinks = `
            <a href="./cgu.html">Conditions générales d'utilisation</a>
            <a href="./mentionslegales.html">Mentions légales</a>
            <a href="./faq.html">FAQ</a>
            <a href="./contact.html">Contact</a>
            <div class="line mT25"></div>
`
const footer = `
            <p class="gradienttext mT10">Crée par AllSafe - Copyright 2022</p>

`

function searchForInputs() {
    const inputs = document.querySelectorAll('.input-label-container')

    inputs.forEach((input) => {
        const type = input.getAttribute('type') || 'text'
        const name = input.getAttribute('name') || ''
        const placeholderInside = input.getAttribute('placeholderInside') || ''
        console.log(name)
        const placeholder = input.getAttribute('placeholder') || ''
        const path = input.getAttribute('path') || ''
        const isTextArea = input.getAttribute('multiline')
        let newInput = inputHTML

        if (isTextArea === 'true') {
            console.log('IS TEXT AREA')
            newInput = inputTextAreaHTML
        }

        input.innerHTML = newInput
            .replace('{type}', type)
            .replace('{name}', name)
            .replace('{placeholder}', placeholder)
            .replace('{path}', path)
            .replace('{placeholderInside}', placeholderInside)
    })
    console.log(inputs)
}

function searchForNavBar() {
    const navBar = document.querySelectorAll('.topNavBar-container')
    const body = document.querySelector('body')

    navBar.forEach((navBar) => {
        navBar.innerHTML = headerHTML
        body.style.cssText = 'padding-top: 50px;'
        console.log('e')
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

function searchForFooter() {
    const footerContainer = document.querySelectorAll('.footer-container')
    footerContainer.forEach((footerContainer) => {
        if (footerContainer.getAttribute('small') !== 'true') {
            footerContainer.innerHTML = footerLinks + footer
        } else {
            footerContainer.innerHTML = footer
        }
    })
}
function toggleBurgerMenu() {
    const burgerMenu = document.querySelector('.topNavBar-container')
    burgerMenu.classList.toggle('topNavBar-burgerMenu--shown')
}
function toggleLangages() {
    const lang = document.querySelector('.langage-selector-content-container')
    lang.classList.toggle('langage-selector-content-container--shown')
}
searchForInputs()
searchForNavBar()
searchForHeader()
searchForFooter()
