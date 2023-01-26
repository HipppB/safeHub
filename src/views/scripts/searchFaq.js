let submitForm = document.querySelectorAll('input[name=search]')

console.log(submitForm)
for (i = 0; i < submitForm.length; i++) {
    submitForm[i].addEventListener('input', (event) =>
        searchFaq(event.target.value)
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

function setFaq(response) {
    let faqs = JSON.parse(response)
    console.log(faqs)

    let faqList = document.createElement('div')
    faqs.forEach((faq) => {
        console.log(faq)
        const faqItem = `<div>
        <p class="gradienttext titleFAQ">
           ${faq['question']}
        </p>
        <p class="paragraphFAQ mT10">
        ${faq['reponse']}
        </p>
        <div class="line mT50"></div>
    </div>
`
        // create userElement with userItem
        let faqElement = document.createElement('div')
        faqElement.innerHTML = faqItem

        // append userElement to usersList
        faqList.innerHTML += faqElement.innerHTML
    })
    // replace #userList with userList
    document.getElementById('faqListContainer').innerHTML = faqList.innerHTML
}

function searchFaq(value) {
    try {
        const formData = JSON.stringify({
            search: value,
        })
        sendXMLHttpObject(formData, '', setFaq)
    } catch (e) {
        // window.alert('Une erreur est intervenue, veuillez réessayer plus tard.')
        console.log(e)
    }
}
