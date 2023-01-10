<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Données</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../views/styles/common/index.css" />
    <link rel="stylesheet" href="../views/styles/headerPrivate.css" />
    <link rel="stylesheet" href="../views/styles/datas.css" />
    <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
    ></script>
</head>
<body>

<?php require 'views/components/headerPrivate.php'; ?>
    <div class="chartContainer">
        <div class="chart">

        <canvas id="myChart"></canvas>
        </div>
    </div>
<div class="dataContainer">
    <h3>Historique des températures</h3>
    <div class="metrics-data">
        <p>La température est de <span class="gradienttext" style="font-size: inherit">19.0</span> °C</p>
        <p class="metrics-hour">10h30</p>
    </div>
    <div class="metrics-data">
        <p>La température est de <span class="gradienttext" style="font-size: inherit">19.0</span> °C</p>
        <p class="metrics-hour">10h30</p>
    </div>
</div>




<!-- Footer -->
<?php require 'views/components/footer.php'; ?>
</body>

<script>
    console.log("yooooo");

    const ctx = document.getElementById('myChart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 600);
    gradient.addColorStop(0, '#f76b1c');
    gradient.addColorStop(1, '#fad961');
    new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            //Insert the divisions for the x-axis here
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "Temperature Data",
                data: [40, 10, 5, 30, 20, 30, 30],
                backgroundColor: gradient,
                borderRadius: Number.MAX_VALUE,
                borderSkipped: false
            },
                {
                    data: [50, 50, 50, 50, 50, 50, 50],
                    borderRadius: Number.MAX_VALUE,
                    borderSkipped: false
                }
            ]
        },

        // Configuration options go here
        options: {
            //causes chart to resize when its container resizes
            responsive: true,
            //setting to false will prevent the height of the chart from shrinking when resizing
            maintainAspectRatio: false,
            barThickness: 20,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    stacked: true,
                    title: {
                        display: false,
                        text: 'Date'
                    },
                    grid :  {
                        display: false,
                    },
                    ticks: {
                        display: true,
                        font: {
                            size: 16
                        }
                    },
                    line: {
                        display: false,
                    }

                },
                y: {
                   display: false,
                },
            },

        },

    });
</script>
</html>