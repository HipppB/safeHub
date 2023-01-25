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

function promoteAdmin(id) {
    try {
        const formData = JSON.stringify({
            action: 'promoteAdmin',
            userid: id,
        })
        sendXMLHttpObject(formData, '', togglePromoteButton)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
function demoteAdmin(id) {
    try {
        const formData = JSON.stringify({
            action: 'demoteAdmin',
            userid: id,
        })
        sendXMLHttpObject(formData, '', togglePromoteButton)
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
        sendXMLHttpObject(formData, '', redirectIfUserDeleted)
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
        sendXMLHttpObject(formData, '', toggleBanButton)
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
            product_id: product_id,
        })
        sendXMLHttpObject(formData, '', toggleBanButton)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}

function togglePromoteButton() {}
function toggleBanButton() {}
function toggleGestionnaireButton() {}
function redirectIfUserDeleted() {}
