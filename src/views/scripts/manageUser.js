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

function toggleAdmin(id) {
    try {
        const formData = JSON.stringify({
            action: 'toggleAdmin',
            userid: id,
        })
        sendXMLHttpObject(formData, '', refreshPage)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}

function deleteUser(id) {
    try {
        const formData = JSON.stringify({
            action: 'deleteUser',
            userid: id,
        })
        sendXMLHttpObject(formData, '', goToDashboard)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
function toggleUserBan(id) {
    try {
        const formData = JSON.stringify({
            action: 'toggleUserBan',
            userid: id,
        })
        sendXMLHttpObject(formData, '', refreshPage)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
function toggleUserGestionnaire(id, product_id) {
    try {
        const formData = JSON.stringify({
            action: 'toggleUserGestionnaire',
            userid: id,
            productid: product_id,
        })
        sendXMLHttpObject(formData, '', refreshPage)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
function refreshPage(response) {
    let r = htmlToElement(response.replace('<!DOCTYPE html>', ''))
    let html = document.querySelector('html')
    document.removeChild(html)
    var element = document.createElement('html')
    element.innerHTML = r
    document.appendChild(element)
    searchforAll()
}
function goToDashboard() {
    window.location.href = '/panel/dashboard'
}
