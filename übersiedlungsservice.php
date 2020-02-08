<!DOCTYPE html>
<html>
<?php require_once('config.php'); ?>

<head>
	<title>Übersiedlungsservice</title>
	<meta charset="UTF-8">
	<meta name="description" content="Umzugsservice" />
	<meta name="keywords" content="Übersiedlungsservice, Umzug, Transport, europaweit" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="scripts/jquery-2.1.4.min.js"></script>
	<script src="scripts/jquery.bxslider.min.js"></script>
	<script src="scripts/jquery.selectbox.js" type="text/javascript"></script>
	<script src="scripts/jquery.timepicker.js"></script>
	<script src="scripts/bootstrap-datepicker.js" charset="UTF-8"></script>
	<script src="scripts/bootstrap-datepicker.de.min.js"></script>
	<script src="scripts/datepair.js"></script>
	<script src="scripts/jquery.datepair.js"></script>

	<link rel="apple-touch-icon" sizes="57x57" href="<?= BASE_URL ?>icons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= BASE_URL ?>icons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= BASE_URL ?>icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= BASE_URL ?>icons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= BASE_URL ?>icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= BASE_URL ?>icons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= BASE_URL ?>icons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= BASE_URL ?>icons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>icons/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?= BASE_URL ?>icons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?= BASE_URL ?>icons/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="<?= BASE_URL ?>icons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?= BASE_URL ?>icons/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?= BASE_URL ?>icons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?= BASE_URL ?>icons/manifest.json">
	<link rel="mask-icon" href="<?= BASE_URL ?>icons/safari-pinned-tab.svg" color="#f4572a">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="<?= BASE_URL ?>icons/mstile-144x144.png">
	<meta name="theme-color" content="#f4572a">

	<link rel="stylesheet" type="text/css" href="content/toast.css">
	<link rel="stylesheet" type="text/css" href="content/icon.css">
	<link href="content/jquery.selectbox.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="content/jquery.timepicker.css">
	<link rel="stylesheet" type="text/css" href="content/bootstrap-datepicker.standalone.css">
	<link rel="stylesheet" type="text>/css" href="content/jquery.bxslider.css" />
	<link rel="stylesheet" type="text/css" href="content/site.css" title="default">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,900,900italic' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="navigation" id="navitesti" style="background-color: white;">
		<img class="title-siedl" src="img/logo-nackt.svg" alt="siedl logo-nackt">
		<a class="nav-link" href="./">HOME</a>
		<a class="nav-link" href="./#die-produkte">PRODUKTE</a>
		<a class="nav-link" href="./übersiedlungsservice.html">ÜBERSIEDLUNG</a>
		<a class="nav-link" href="./#reservieren">RESERVIEREN</a>
		<a class="nav-link" href="service.html#service">KONTAKT</a>
		<a class="nav-link" href="anfahrt.html#anfahrt">STANDORT</a>
		<a href="javascript:void(0);" class="icon">
			<div class="navigation-mobile"></div>
		</a>
	</div>
	<div class="line"></div>
	<div class="flexigrid ">
		<div class=" box-text">
			<img class="box-img" src="img/siedlmobil.png">
		</div>
		<div class=" box-text">
			<div id="siedl-tiedl"></div>
			<p>Unser Ziel ist es Sie mit einem stressfreien und kostengünstigen Umzugserlebnis zu versorgen.</p>
			<p>Ob Sie privat oder als Unternehmen siedeln, unsere professionellen Mitarbeiter schaffen ihre Gegenstände sicher und effizient wohin Sie wollen, europaweit! </p>
			<p>Wir bieten auch günstige Lagermöglichkeiten.</p>
			<h2>ab <span>€49,-</span> pro Stunde</h2>
			<div class="box-link">
				<a href="./#reservieren">
					<h2>Jetzt reservieren</h2>
				</a>
			</div>
		</div>
	</div>
	<div class="line"></div>
	<div class="flexigrid ">
		<div class="flexicol">
			<div class="bimbo-title">
				<img class="bimbo-img" src="img/shields.png">
				<h1>Sicherheit</h1>
				<p>Unsere Mitarbeiter behandeln Ihre Möbel und Güter mit größter Vorsicht. Beim Transport wird alles sorgfältig gepolstert und festgeschnallt.</p>
			</div>
		</div>
		<div class="flexicol">
			<div class="bimbo-title">
				<img class="bimbo-img" src="img/hands.png">
				<h1>Zuverlässigkeit</h1>
				<p>Wir erscheinen pünktlich zum vereinbarten Termin und behandeln ihre Angelegenheiten mit höchster Diskretion.</p>
			</div>
		</div>
		<div class="flexicol">
			<div class="bimbo-title">
				<img class="bimbo-img" src="img/tools.png">
				<h1>Möbel Ab- und Aufbau</h1>
				<p>Wir demontieren Ihre Möbel fachgerecht und bauen Sie am Zielort wieder auf. Das dafür benötigte Werkzeug bringen wir mit.</p>
			</div>
		</div>
		<div class="flexicol">
			<div class="bimbo-title">
				<img class="bimbo-img" src="img/lock.png">
				<h1>Lagerung</h1>
				<p>Möbel können bei uns kostengünstig ein- und zwischengelagert werden.</p>
			</div>
		</div>
	</div>
	<?php include('templates/footer.php') ?>