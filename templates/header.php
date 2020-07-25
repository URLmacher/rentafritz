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
  <!-- FONT -->
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-300.woff" type="font/woff" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-regular.woff" type="font/woff" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-700italic.woff" type="font/woff" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-900.woff" type="font/woff" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/material.woff" type="font/woff" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-300.woff2" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-regular.woff2" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-700italic.woff2" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/roboto-v20-latin-900.woff2" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" as="font" href="<?= $config['BASE_URL'] ?>/fonts/material2.woff2" type="font/woff2" crossorigin="anonymous">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= $config['BASE_URL'] ?>/dist/site.css" />
  <script>
    //bad browser
    document.addEventListener('DOMContentLoaded', function() {
      var badBrowserErrorDom = document.getElementById('bad-browser-error');
      var ua = window.navigator.userAgent;
      var msie = ua.indexOf('MSIE ');

      if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        badBrowserErrorDom.classList.remove('rent__hidden');
      }
    })
  </script>
  <style>
    .ie__error-overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: white;
      z-index: 99999;
    }

    .ie__error-text {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>

<body>
  <!-- Error Overlay -->
  <div id="bad-browser-error" class="ie__error-overlay rent__hidden">
    <div class="ie__error-text">
      <h1 class="rent__success-title">Es tut uns Leid</h1>
      <h5 class="rent__success-text">Ihr Internet-Browser wird von uns nicht unterstützt</h5>
    </div>
  </div>