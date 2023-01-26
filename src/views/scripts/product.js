let submitForm = document.getElementById('product_form')
let name = document.getElementById('name')
let houseName = document.getElementsByName('accomodationName')[1]
let roomName = document.getElementsByName('roomName')[1]
let productCode = document.getElementsByName('productCode')[1]
let userCode = document.getElementsByName('userCode')[1]
let userCodeExpiration = document.getElementsByName('userCodeExpiration')[1]

let nameError = 'Veuillez entrer un nom de produit'
let houseNameError = "Veuiilez entrer un nom d'hébergement"
let roomNameError = 'Veuillez entrer un nom de chambre'
let productCodeError = 'Veuillez entrer un code produit'
let userCodeError = 'Veuillez entrer un code utilisateur'
let userCodeExpirationError = "Veuillez entrer une date d'expiration"

function messageValidation(field, error, event) {
    if (!field.value) {
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else {
        field.parentNode.parentNode.nextElementSibling.innerHTML = ''
        return true
    }
}

console.log('hello')

function validateForm(event) {
    console.log('validateForm')
    const nameValid = messageValidation(name, nameError, event)
    const houseNameValid = messageValidation(houseName, houseNameError, event)
    const roomNameValid = messageValidation(roomName, roomNameError, event)
    const productCodeValid = messageValidation(
        productCode,
        productCodeError,
        event
    )
    const userCodeValid = messageValidation(userCode, userCodeError, event)
    const userCodeExpirationValid = messageValidation(
        userCodeExpiration,
        userCodeExpirationError,
        event
    )

    if (
        nameValid &&
        houseNameValid &&
        roomNameValid &&
        productCodeValid &&
        userCodeValid &&
        userCodeExpirationValid
    ) {
        console.log('formValid')
        // event.innerHTML.submit()
    }
}

submitForm.addEventListener('submit', validateForm)
