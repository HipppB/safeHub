let submitForm = document.getElementById('reset_form')
let password = document.getElementsByName('password')[1]
let passwordConfirm = document.getElementsByName('confirmPassword')[1]


let passwordError = 'Le mot de passe doit être de 8 caractères minimum et contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial'
let passwordConfirmError = 'Les mots de passe ne correspondent pas'

let passwordRegex =/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
function passwordMatch(password, passwordConfirm, error, event) {
    if (password.value !== passwordConfirm.value) {
        passwordConfirm.parentNode.parentNode.nextElementSibling.innerHTML = error
        event.preventDefault()
        return false
    } else {
        passwordConfirm.parentNode.parentNode.nextElementSibling.innerHTML = ''
        return true
    }
}

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

function validateForm(event) {
    const passwordValid = fieldValidation(password, passwordRegex, passwordError, event)
    const passwordConfirmValid = passwordMatch(password, passwordConfirm, passwordConfirmError, event)

    if (
          passwordConfirmValid &&
       passwordValid
    ) {
        event.innerHTML.submit()
    }
}

submitForm.addEventListener('submit', validateForm)