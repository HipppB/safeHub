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
    <script type='text/javascript' src='../views/scripts/chart.js'async></script>
    <script
            type="text/javascript"
            src="../views/scripts/common/components.js"
            async
    >
        const datas = <?php echo "test"; ?>;
    </script>
</head>
<body>

<?php require 'views/components/headerPrivate.php'; ?>
<div class='content-container'>

    <div class="chartContainer">
        <div class="chart">

        <canvas id="myChart"></canvas>
        </div>
    </div>
<div class="dataContainer">
    <h3>Historique des températures</h3>
    <?php foreach ($datas as $data) { ?>
    <div class="metrics-data">
        <p>La température est de <span class="gradienttext" style="font-size: inherit"><?php echo $data["data"]; ?></span> °C</p>
        <p class="metrics-hour"><?php $date =new DateTime($data['date']);
        echo $date ->format('d/m/Y H:i')?></p>
    </div>
    <?php } ?>
</div>



<div class="footer-container" small="true"></div>
</div>

</body>
</html>
