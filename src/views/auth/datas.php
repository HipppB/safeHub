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
</html>
