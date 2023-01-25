let submitForm = document.querySelectorAll('input[name=productSearch]')

console.log(submitForm)
for (i = 0; i < submitForm.length; i++) {
    submitForm[i].addEventListener('input', (event) =>
        searchUser(event.target.value)
    )
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

function setUsers(response) {
    let users = JSON.parse(response)
    console.log(users)

    let userList = document.createElement('div')
    users.forEach((user) => {
        console.log(user)
        const userItem = `<div class="item-in-list rwidth" onclick="window.location.href='user?userid=${parseInt(
            user['id']
        )}'">
        <div class="name">
            <div class="gradienttext s030">
                ${user['name']} ${user['lastname']}
            </div>
            <div class="s025 leftAl">
                ${user['email']}
            </div>
        </div>
        <div>
            <div class="small-2 s025">
                ${user['phone']}
            </div>
        </div>
        </div>
        <div class="line rwidth"></div>
</div>
`
        // create userElement with userItem
        let userElement = document.createElement('div')
        userElement.innerHTML = userItem

        // append userElement to usersList
        userList.innerHTML += userElement.innerHTML
    })
    // replace #userList with userList
    document.getElementById('userList').innerHTML = userList.innerHTML
}

function searchUser(value) {
    try {
        const formData = JSON.stringify({
            search: value,
        })
        sendXMLHttpObject(formData, '', setUsers)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
