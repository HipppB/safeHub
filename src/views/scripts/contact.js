let submitForm = document.getElementById('contact_form')
let firstName = document.getElementsByName('firstname')[1]
let lastName = document.getElementsByName('surname')[1]
let email = document.getElementsByName('email')[1]
let phpneNumber = document.getElementsByName('telephone')[1]
let message = document.getElementsByName('message')[1]

let firstNameError = 'Veuiilez entrer votre prénom'
let lastNameError = 'Veuillez entrer votre nom'
let emailError = 'Veuillez entrer une adresse email valide'
let phoneNumberError = 'Veuiilez entrer un numéro de téléphone valide'
let messageError = 'Veuillez entrer un message'

let phpneNumberRegex =
    /^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/
let emailRegex = /^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/

function fieldValidation(field, regex, error, event) {
    if (field.value === '') {
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else if (!field.value.match(regex)) {
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else {
        field.parentNode.parentNode.nextElementSibling.innerHTML = ''
        return true
    }
}

function messageValidation(field, error, event) {
    if (field.value === '') {
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else {
        field.parentNode.parentNode.nextElementSibling.innerHTML = ''
        return true
    }
}

function validateForm(event) {
    messageValidation(message, messageError, event)
    messageValidation(firstName, firstNameError, event)
    messageValidation(lastName, lastNameError, event)
    fieldValidation(email, emailRegex, emailError, event)
    fieldValidation(phpneNumber, phpneNumberRegex, phoneNumberError, event)
    return true
}

submitForm.addEventListener('submit', validateForm)
