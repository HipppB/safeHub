const ctx = document.getElementById('myChart').getContext('2d')
var gradient = ctx.createLinearGradient(0, 0, 0, 600)
gradient.addColorStop(0, '#f76b1c')
gradient.addColorStop(1, '#fad961')
new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        //Insert the divisions for the x-axis here
        labels: [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
        ],
        datasets: [
            {
                label: 'Temperature Data',
                data: [40, 10, 5, 30, 20, 30, 30],
                backgroundColor: gradient,
                borderRadius: Number.MAX_VALUE,
                borderSkipped: false,
            },
            {
                data: [50, 50, 50, 50, 50, 50, 50],
                borderRadius: Number.MAX_VALUE,
                borderSkipped: false,
            },
        ],
    },
    options: {
        //causes chart to resize when its container resizes
        responsive: true,
        //setting to false will prevent the height of the chart from shrinking when resizing
        maintainAspectRatio: false,
        barThickness: 20,
        plugins: {
            legend: {
                display: false,
            },
        },
        scales: {
            x: {
                stacked: true,
                title: {
                    display: false,
                    text: 'Date',
                },
                grid: {
                    display: false,
                },
                ticks: {
                    display: true,
                    font: {
                        size: 16,
                    },
                },
                line: {
                    display: false,
                },
            },
            y: {
                display: false,
            },
        },
    },
})
