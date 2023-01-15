const ctx = document.getElementById('myChart').getContext('2d')
var gradient = ctx.createLinearGradient(0, 0, 0, 600)
gradient.addColorStop(0, '#f76b1c')
gradient.addColorStop(1, '#fad961')
console.log(datas)
function getDatas() {
    let objXmlHttpRequest = new XMLHttpRequest()
    objXmlHttpRequest.onreadystatechange = function () {
        if (objXmlHttpRequest.readyState === 4) {
            if (objXmlHttpRequest.status === 200) {
                alert(objXmlHttpRequest.responseText)
            } else {
                alert('Error' + objXmlHttpRequest.status)
                alert(objXmlHttpRequest.responseText)
            }
        }
    }
    objXmlHttpRequest.open('GET', '', true)
    objXmlHttpRequest.send()
}
getDatas()

// new Chart(ctx, {
//     // The type of chart we want to create
//     type: 'bar',
//
//     // The data for our dataset
//     data: {
//         //Insert the divisions for the x-axis here
//         labels: datas.map((data) => data.date),
//         datasets: [
//             {
//                 label: 'Temperature Data',
//                 data: datas.map((data) => data.data),
//                 backgroundColor: gradient,
//                 borderRadius: Number.MAX_VALUE,
//                 borderSkipped: false,
//             },
//             // {
//             //     data: [50, 50, 50, 50, 50, 50, 50],
//             //     borderRadius: Number.MAX_VALUE,
//             //     borderSkipped: false,
//             // },
//         ],
//     },
//     options: {
//         //causes chart to resize when its container resizes
//         responsive: true,
//         //setting to false will prevent the height of the chart from shrinking when resizing
//         maintainAspectRatio: false,
//         barThickness: 20,
//         plugins: {
//             legend: {
//                 display: false,
//             },
//         },
//         scales: {
//             x: {
//                 stacked: true,
//                 title: {
//                     display: false,
//                     text: 'Date',
//                 },
//                 grid: {
//                     display: false,
//                 },
//                 ticks: {
//                     display: true,
//                     font: {
//                         size: 16,
//                     },
//                 },
//                 line: {
//                     display: false,
//                 },
//             },
//             y: {
//                 display: false,
//             },
//         },
//     },
// })
