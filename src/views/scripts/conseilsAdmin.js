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
                    'textarea[name="search"]'
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
                        updateListConseil(response.tips)
                    } catch (e) {
                        // window.alert(
                        //     'Une erreur est survenue, veuillez réessayer plus tard'
                        // )
                    }
                    // if reponse is successful
                    // window.alert('Success')
                }
                // get result
                sendXMLHttpObject(formData, '', callback)
            })
    } catch (e) {
        window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}

addTips()

function updateListConseil(listConseil) {
    console.log('list tips', listConseil)
    let liste = document.createElement('div')
    console.log('deb', liste)

    listConseil.forEach((item) => {
        console.log(item)
        // create list item in dom
        let container = document.createElement('div')
        container.classList = 'iconParagraph mB25'
        container.innerHTML = `
                        <p class='conseilsParagraph'>
                        ${item.content}
                        </p>
                        <img src='../views/assets/icons/close.svg' id='deleteBtn' onClick='deleteTips()'/>
                        `

        liste.appendChild(container)
        let lineContainer = document.createElement('div')
        lineContainer.classList = 'line'
        liste.appendChild(lineContainer)
    })
    console.log('fin', liste)
    document.getElementById('listConseil').replaceWith(liste)
}

function deleteTips(id) {
    console.log('id', id)
    try {
        // set to form data
        const formData = JSON.stringify({
            id: id,
            action: 'delete',
        })
        //send form data to server
        function callback(response) {
            // parse response
            console.log(response)
            try {
                response = JSON.parse(response)
                updateListConseil(response.tips)
            } catch (e) {
                // window.alert(
                //     'Une erreur est survenue, veuillez réessayer plus tard'
                // )
            }
            // if reponse is successful
            // window.alert('Success')
        }
        // get result
        sendXMLHttpObject(formData, '', callback)
    } catch (e) {
        window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
