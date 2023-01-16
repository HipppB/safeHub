let submitForm = document.getElementById('contact_form')
let firstName = document.getElementsByName('firstname')[1]
let lastName = document.getElementsByName('surname')[1]
let email = document.getElementsByName('email')[1]
let phoneNumber = document.getElementsByName('telephone')[1]
let message = document.getElementsByName('message')[1]

let firstNameError = 'Veuillez entrer votre prénom'
let lastNameError = 'Veuillez entrer votre nom'
let emailError = 'Veuillez entrer une adresse email valide'
let phoneNumberError = 'Veuillez entrer un numéro de téléphone valide'
let messageError = 'Veuillez entrer un message'

let phpneNumberRegex =
    /^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/
let emailRegex = /^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/

function fieldValidation(field, regex, error, event) {
    if (!field.value) {
        console.log('false')
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else if (!field.value.match(regex)) {
        console.log('false')
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else {
        console.log('true')
        field.parentNode.parentNode.nextElementSibling.innerHTML = ''
        return true
    }
}

function messageValidation(field, error, event) {
    if (!field.value) {
        field.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        console.log('false')
        return false
    } else {
        console.log('true')
        field.parentNode.parentNode.nextElementSibling.innerHTML = ''
        return true
    }
}

function validateForm(event) {
    const messageValid = messageValidation(message, messageError, event)
    const firstnameValid = messageValidation(firstName, firstNameError, event)
    const lastNameValid = messageValidation(lastName, lastNameError, event)
    const emailValid = fieldValidation(email, emailRegex, emailError, event)
    const phoneNumberValid = fieldValidation(
        phoneNumber,
        phpneNumberRegex,
        phoneNumberError,
        event
    )

    if (
        messageValid &&
        firstnameValid &&
        lastNameValid &&
        emailValid &&
        phoneNumberValid
    ) {
        event.innerHTML.submit()
    }
}

submitForm.addEventListener('submit', validateForm)
