<?php
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <?php if (basename($_SERVER['SCRIPT_FILENAME']) === 'form-magasin.php'): ?>
        <script src="../assets/js/magasin.js" charset="utf-8"></script>
    <?php elseif (basename($_SERVER['SCRIPT_FILENAME']) === 'form-stock.php'): ?>
        <script src="../assets/js/stock.js" charset="utf-8"></script>
    <?php endif; ?>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Covid Market</title>
</head>

<header>
    <h1 class="col-12 text-center">
        Covid Market
    </h1>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</header>
