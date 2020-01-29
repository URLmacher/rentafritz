<!DOCTYPE html>
<html>
<head>
	<title>RENTAFRITZ</title>
	<meta charset="UTF-8">
	<meta name="description" content="Verleih für Fahrzeuge und Geräte" />
	<meta name="keywords" content="Transporter, Elektroheizgerät, Luftentfeuchter, Umzugservice, Holzspalter, Temperaturmessgerät, Vertikutierer, Feuchtemessgerät, Helligkeitsmessgerät, Laserentfernungsmesser, mieten, leihen" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="scripts/jquery-2.1.4.min.js"></script>	
	<script src="scripts/jquery.bxslider.min.js"></script>
	<script src="scripts/jquery.selectbox.js" type="text/javascript"></script>
	<script src="scripts/jquery.timepicker.js"></script>
	<script src="scripts/bootstrap-datepicker.js" charset="UTF-8"></script>
	<script src="scripts/bootstrap-datepicker.de.min.js"></script>
	<script src="scripts/datepair.js"></script>
	<script src="scripts/jquery.datepair.js"></script>
	
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="manifest.json">
	<link rel="mask-icon" href="safari-pinned-tab.svg" color="#f4572a">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="mstile-144x144.png">
	<meta name="theme-color" content="#f4572a">
	
	<link rel="stylesheet" type="text/css" href="content/toast.css">
	<link rel="stylesheet" type="text/css" href="content/icon.css">
	<link rel="stylesheet" href="content/jquery.selectbox.css"  type="text/css" />
	<link rel="stylesheet" type="text/css" href="content/jquery.timepicker.css">
	<link rel="stylesheet" type="text/css" href="content/bootstrap-datepicker.standalone.css">
	<link rel="stylesheet" type="text/css" href="content/jquery.bxslider.css"  />
	<link rel="stylesheet" type="text/css" href="content/site.css?<?php echo time(); ?>" title="default">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,900,900italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<noscript>
		<h3>Um diese Webseite im vollen Umfang nutzen zu können, aktivieren Sie bitte Javasript in Ihrem Browser.</h3>
	</noscript>
	<div class="mobile-title">
		<a href="tel:+436644128588" class="telefonnummer"></a>
	</div>
	<div class="back">
		<div class="title" alt="RENTAFRITZ - VERLEIH FÜR FAHRZEUGE UND GERÄTE ÜBERSIEDLUNGSSERVICE - SONDERTRANSPORTE 0664 41 28 588">
		</div>
	</div><!--
	--><div class="navigation" id="navitesti">
			<a class="nav-link" href="./">HOME</a>
			<a class="nav-link" href="./#die-produkte">PRODUKTE</a>
			<a class="nav-link" href="./übersiedlungsservice.html">ÜBERSIEDLUNG</a>
			<a class="nav-link" href="./#reservieren">RESERVIEREN</a>
			<a class="nav-link" href="service.html#service">KONTAKT</a>
			<a class="nav-link" href="anfahrt.html#anfahrt">STANDORT</a>
			<a href="javascript:void(0);" class="icon" >
    			<div class="navigation-mobile"></div>
 			</a>
		</div>
	<div class="grid">
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/reservierung.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/transporter.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/umzugservice.php'); ?>
		</div>
	</div>
	<div class="grid">
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/anhanger.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/palettenhubwagen.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/luftentfeuchter.php'); ?>
		</div>
	</div>
	<div class="grid">
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/holzspalter.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/vertikutierer.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/heizgeraet.php'); ?>
		</div>
	</div>
	<div class="grid">
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/wasserpumpe.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/helligkeit.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/temperatur.php'); ?>
		</div>
	</div>
	<div class="grid">
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/feuchtemessgeraet.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/lasermesser.php'); ?>
		</div>
		<div class="grid__col grid__col--1-of-3">
			<?php include('sections/sortimentwachsi.php'); ?>
		</div>
	</div>
	
	<div class="zitat">
		<div class="comment hide">
			<div class="comment-text">
				<h3>"So siedelt man gerne! Wir sind überhappy dass der gesamte Umzug, sowie Neuaufbau von unendlich vielen Möbelstücken so super funktioniert hat"</h3>
			</div>
			<div class="comment-user">
				<p>-Kati aus Deutsch Kaltenbrunn</p>
				<p>13.09.2019</p>
			</div>		
		</div>
		<div class="comment hide">
			<div class="comment-text">
				<h3>"Kann man nur empfehlen, Übersiedlung von 2 Haushalten ein einem Tag. Kompetentes Team, höchst professionell und absolut preiswert. Einfach nur Klasse"</h3>
			</div>
			<div class="comment-user">
				<p>-Andreas aus Graz</p>
				<p>28.04.2019</p>
			</div>		
		</div>
		<div class="comment hide">
			<div class="comment-text">
				<h3>"Brauchte zum Siedeln einen Transporter, RENTAFRITZ konnte mir  schnell und günstig einen  zur Verfügung stellen. War sehr zufrieden."</h3>
			</div>
			<div class="comment-user">
				<p>-Babsi aus Pischelsdorf</p>
				<p>21.02.2016</p>
			</div>		
		</div>
		<div class="comment hide">
			<div class="comment-text">
				<h3>"Freundliche und kompetente Bedienung, werde beim nächsten Mal mich wieder an RENTAFRITZ wenden."</h3>
			</div>
			<div class="comment-user">
				<p>-Erni aus Graz</p>
				<p>22.02.2016</p>
			</div>		
		</div>
		<div class="comment hide">
			<div class="comment-text">
				<h3>"Hab mir den Transporter von RENTAFRITZ gemietet und war mit dem Preis-Leistungsverhältnis mehr als zufrieden."</h3>
			</div>
			<div class="comment-user">
				<p>-Klaus-Peter aus Maria Fieberbründl</p>
				<p>19.04.2016</p>
			</div>		
		</div>
	</div>
	<div class="footer">
		<div class="footlinks left">
			<ul>
				<li><a href="anfahrt.html#anfahrt">Anfahrt</a></li>
				<li><a href="service.html#service">Service</a></li>
				<li><a href="oeffnungszeiten.html#link-oeffnung">Öffnungszeiten</a></li>	
				<li><a href="agb.html#link-agb">AGB</a></li>
				<li><a href="impressum.html#impress-link">Impressum</a></li>
			</ul>
		</div>
		<div class="footlinks right">
			<ul>
				<li>
					<a href="https://www.facebook.com/Rentafritz-1731009870517628/"><img src="img/face.png"></a>
				<li>
				<li>
					<a href="https://plus.google.com/115557789819282817203/about"><img src="img/google.png" alt="google+"></a>
				</li>
			</ul>
		</div>
	</div>

	<script src="scripts/codes.js"></script>
</body>
</html>