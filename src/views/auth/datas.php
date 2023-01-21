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
<?php if (sizeof($datas) !== 0) { ?>
<div class='content-container'>

    <div class="chartContainer">
        <div class="chart">

        <canvas id="myChart"></canvas>
        </div>
    </div>
<div class="dataContainer">
    <h3><?php printTranslation($type . 'History'); ?></h3>
    <?php foreach ($datas as $data) { ?>
    <div class="metrics-data">
        <p><?php printTranslation(
            $type . 'DataSentence'
        ); ?>  <span class="gradienttext" style="font-size: inherit"><?php echo $data[
      'data'
  ]; ?></span>
            <?php if ($type === 'temperature') {
                echo '°C';
            } elseif ($type === 'humidity') {
                echo '%';
            } elseif ($type === 'carbon_dioxide') {
                echo 'ppm';
            } elseif ($type === 'sound_level') {
                echo 'dB';
            } ?>
            </p>
        <p class="metrics-hour"><?php
        $date = new DateTime($data['date']);
        echo $date->format('d/m/Y H:i');
        ?></p>
    </div>
    <?php } ?>
</div>
<?php } else { ?>
    <div class="dataNotFound">
        <p>
            <?php printTranslation('noDataFoundProduct'); ?>
        </p>
        <div>
            <a href="./dashboard" class="outline-button mT100"
            ><?php printTranslation('goToDashBoard'); ?></a>
        </div>

    </div>

    <?php } ?>


    <?php require 'views/components/footer.php'; ?>
</div>

</body>
</html>
