<?php
/** @var array $datas */
?>

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
    </script>
</head>
<body>

<?php require 'views/components/headerPrivate.php'; ?>
<?php if(sizeof($datas) !== 0) { ?>
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
<?php } else { ?>
    <div class="dataNotFound">
        <p>
            Aucune donnée disponible pour ce produit
        </p>
        <div>
            <a href="./dashboard" class="outline-button mT100"
            >Retour au dashboad</a>
        </div>

    </div>

    <?php } ?>


<div class="footer-container" small="true"></div>
</div>

</body>
</html>
