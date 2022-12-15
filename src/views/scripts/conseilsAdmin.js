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

function addTips() {
    try {
        document
            .getElementById('add-tips-form')
            .addEventListener('submit', function (e) {
                e.preventDefault()
                // get form data from DOM

                const content = document.querySelector(
                    'textarea[name="content"]'
                ).value
                // set to form data
                const formData = JSON.stringify({
                    content: content,
                })

                //send form data to server
                function callback(response) {
                    // parse response
                    console.log(response)
                    try {
                        response = JSON.parse(response)
                    } catch (e) {
                        window.alert(
                            'Une erreur est survenue, veuillez réessayer plus tard'
                        )
                    }
                    // if reponse is successful
                    window.alert(response.message)
                }
                // get result
                sendXMLHttpObject(formData, '', callback)
            })
    } catch (e) {
        window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}

function deleteTips() {}
