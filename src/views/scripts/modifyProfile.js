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

function changeFormSubmit() {
    try {
        document
            .getElementById('modify-profile-form')
            .addEventListener('submit', function (e) {
                e.preventDefault()
                // get form data from DOM

                const lastname = document.querySelector(
                    'input[name="lastname"]'
                ).value
                const name = document.querySelector('input[name="name"]').value
                const phone = document.querySelector(
                    'input[name="phone"]'
                ).value
                const email = document.querySelector(
                    'input[name="email"]'
                ).value
                const birth_date = document.querySelector(
                    'input[name="birth_date"]'
                ).value
                // set to form data
                const formData = JSON.stringify({
                    lastname: lastname,
                    name: name,
                    phone: phone,
                    email: email,
                    birth_date: birth_date,
                })

                // send form data to server
                function callback(response) {
                    // parse response
                    console.log(response)
                    try {
                        var response = JSON.parse(response)
                    } catch (e) {
                        // window.alert(
                        //     'Une erreur est intervenue, veuillez réessayer plus tard.'
                        // )
                    }
                    // if response is successful
                    window.alert('Votre profil à été modifié !')
                }
                // get result
                sendXMLHttpObject(formData, '', callback)
            })
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}

changeFormSubmit()
