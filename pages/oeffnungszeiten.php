<?php
$title_addition = ' | Öffnungszeiten';
$site_desc = 'Öffnungszeiten';
include('templates/header.php');
include('templates/nav-top.php');
?>
<div class="grid">
	<div class="grid__col grid__col--1-of-2">
		<div class="agb" id="link-oeffnung">
			<h3>Öffnungszeiten</h3>
			<p>MO-FR: 08:00-12:00 Uhr</p>
			<br />
			<p>Oder nach Voranmeldung</p>
		</div>
	</div>
	<div class="grid__col grid__col--1-of-2">
		<div class="object product">
			<a href="./">
				<div class="home-link">
					<h3>zurück zur Startseite</h3>
				</div>
			</a>
		</div>
	</div>
</div>
<?php include('templates/footer.php') ?>