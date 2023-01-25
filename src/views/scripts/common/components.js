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
        <input type="{type}" name="{name}" placeholder="{placeholderInside}" id="input-input-{name}" value="{value}"/>
        <img src="{path}" id="input-{name}"/>
    </div>
`
const inputTextAreaHTML = `
<label for="{name}">{placeholder}</label>
    <div class="input-container">
        <textarea rows="5" type="{type}" name="{name}" id="input-input-{name}" placeholder="{placeholderInside}">{value}</textarea>
        <img src="{path}" id="input-{name}"/>
    </div>
`

const headerTitleButton = `
        <div class="icon-container" onclick="history.back();">
            <img
                src="{leftButtonPath}"
                alt=""
            />
        </div>

            <h1 class="title gradienttext">{title}</h1>

        <div class="icon-container" onclick="{rightAction}">
            <img
                id="rightButtonImg"
                src="{rightButtonPath}"
                alt=""
                style="width:{width}; height: {height};"
            />
        </div>
`

const footerLinks = `
            <a href="./cgu">Conditions générales d'utilisation</a>
            <a href="./mentionslegales">Mentions légales</a>
            <a href="./faq">FAQ</a>
            <a href="./contact">Contact</a>
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
        const value = input.getAttribute('value') || ''
        let newInput = inputHTML
        // check if attribute required exists
        const isRequired = input.hasAttribute('required')

        if (isTextArea === 'true') {
            console.log('IS TEXT AREA')
            newInput = inputTextAreaHTML
        }

        input.innerHTML = newInput
            .replace('{type}', type)
            .replace('{name}', name)
            .replace('{name}', name)
            .replace('{name}', name)
            .replace('{name}', name)
            .replace('{placeholder}', placeholder)
            .replace('{path}', path)
            .replace('{placeholderInside}', placeholderInside)
            .replace('{value}', value)
        console.log(input.innerHTML)

        document.getElementById(`input-input-${name}`).required = isRequired

        if (!path) {
            document.getElementById(`input-input-${name}`).style.paddingRight =
                '20px'

            document.getElementById(`input-${name}`).style.display = 'none'
        }
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
            .replace('{rightAction}', rightAction)

        if (!rightButtonPath) {
            document.getElementById('rightButtonImg').style.display = 'none'
        }
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

function searchErrors() {
    const urlSearch = window.location.search
    const urlParams = new URLSearchParams(urlSearch)
    const errors = document.querySelectorAll('.error')
    if (urlParams.get('error')) {
        errors.forEach((error) => {
            if (error.getAttribute('error') === urlParams.get('error')) {
                error.style.display = 'block'
            }
        })
    }
}
function sendXMLHttpObject(content, url, callback, method = 'POST') {
    var xmlHttp = false
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest()
    } else if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject('Microsoft.XMLHTTP')
        } catch (e) {
            try {
                xmlHttp = new ActiveXObject('Msxml2.XMLHTTP')
            } catch (e) {
                xmlHttp = false
            }
        }
    }
    if (!xmlHttp) return false

    xmlHttp.open(method, url, true)
    xmlHttp.setRequestHeader(
        'Content-Type',
        'application/x-www-form-urlencoded'
    )
    xmlHttp.send(content)
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            callback(xmlHttp.responseText)
        }
    }

    return xmlHttp
}
/**
 * @param {String} HTML representing a single element
 * @return {Element}
 */
function htmlToElement(html) {
    var template = document.createElement('template')
    html = html.trim() // Never return a text node of whitespace as the result
    template.innerHTML = html
    return html
}

function onClickLangage(lang) {
    function callback(response) {
        // parse response
        let r = htmlToElement(response.replace('<!DOCTYPE html>', ''))
        let html = document.querySelector('html')
        document.removeChild(html)
        var element = document.createElement('html')
        element.innerHTML = r
        document.appendChild(element)
        searchforAll()
    }
    let url = `${window.location.pathname}?action=changeLang&lang=${lang}`
    if (window.location.search) {
        url = `${window.location.pathname}${window.location.search}&action=changeLang&lang=${lang}`
    }
    sendXMLHttpObject('', url, callback, 'GET')
}

function searchforAll() {
    searchForInputs()

    searchForHeader()

    searchErrors()
}

searchforAll()
