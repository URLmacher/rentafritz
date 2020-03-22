<!DOCTYPE html>
<html>

<head>
  <?php $config = include_once('./backend/CONFIG.php'); ?>

  <title>RENTAFRITZ<?php echo $title_addition; ?></title>
  <meta charset="UTF-8">
  <meta name="description" content="<?php echo $site_desc; ?>" />
  <meta name="keywords" content="Transporter, Elektroheizgerät, Luftentfeuchter, Umzugservice, Holzspalter, Temperaturmessgerät, Vertikutierer, Feuchtemessgerät, Helligkeitsmessgerät, Laserentfernungsmesser, mieten, leihen" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FAVICONS -->
  <link rel="icon" type="image/png" href="<?= $config['BASE_URL'] ?>/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?= $config['BASE_URL'] ?>/favicon-194x194.png" sizes="194x194">
  <link rel="icon" type="image/png" href="<?= $config['BASE_URL'] ?>/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?= $config['BASE_URL'] ?>/favicon-16x16.png" sizes="16x16">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#f4572a">
  <!-- THIRD PARTY -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,900,900italic' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= $config['BASE_URL'] ?>/content/materialize.min.css" media="screen,projection" />
  <!-- MEINS -->
  <link rel="stylesheet" type="text/css" href="<?= $config['BASE_URL'] ?>/content/utility.css" />
  <link rel="stylesheet" type="text/css" href="<?= $config['BASE_URL'] ?>/content/product.css" />
  <link rel="stylesheet" type="text/css" href="<?= $config['BASE_URL'] ?>/content/reservierung.css" />
  <link rel="stylesheet" type="text/css" href="<?= $config['BASE_URL'] ?>/content/site.css" />
</head>

<body>
  <noscript>
    <h3>Um diese Webseite im vollen Umfang nutzen zu können, aktivieren Sie bitte Javasript in Ihrem Browser.</h3>
  </noscript>
  <!-- <div class="mobile-title">
        <a href="tel:+436644128588" class="telefonnummer"></a>
    </div>
    <div class="back">
        <div class="title" alt="RENTAFRITZ - VERLEIH FÜR FAHRZEUGE UND GERÄTE ÜBERSIEDLUNGSSERVICE - SONDERTRANSPORTE 0664 41 28 588">
        </div>
    </div> -->