const ctx = document.getElementById('myChart').getContext('2d')
const gradient = ctx.createLinearGradient(0, 0, 0, 600)
gradient.addColorStop(0, '#f76b1c')
gradient.addColorStop(1, '#fad961')
// console.log(datas)
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
let datas = [];
sendXMLHttpObject('', 'http://localhost/get-metrics', function (response) {
    datas = JSON.parse(response);
    datas =datas.slice(datas.length - 10, datas.length);
    let chart  =new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
// The data for our dataset
        data: {
            //Insert the divisions for the x-axis here
            labels: datas.map((data) => {
                const date = new Date(data.date);
                return date.toLocaleDateString('fr-Fr', {
                    day: 'numeric',
                    month: 'numeric',
                    year: '2-digit'
                }) + ' ' + date.getHours() +'h';
            }),
            datasets: [{
                label: "Temperature Data",
                backgroundColor: gradient,
                borderRadius: Number.MAX_VALUE,
                borderSkipped: false,
                //Insert data points here (y-axis)
                data: datas.map((data) => data.data),
            }]
        },
// Configuration options go here
        options: {
            barThickness: 30,
            plugins: {
                legend: {
                    display: false,
                }
            },
            //causes chart to resize when its container resizes
            responsive: true,
            //setting to false will prevent the height of the chart from shrinking when resizing
            maintainAspectRatio: false,
            scales: {
                x: {
                    display: window.innerWidth >= 1000,
                    ticks: {
                        display: true,
                    },
                    grid: {
                        display: false,
                    }
                },
                y: {
                    display: false,
                }
            }

        }
    })
    window.addEventListener('resize', () => {
        chart.options.scales.x.display = window.innerWidth >= 1000;
        chart.update();
    });
});



