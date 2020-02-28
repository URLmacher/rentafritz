<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include dirname(dirname(__FILE__)).'/config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post){
	include 'functions.php';

	$name = stripslashes($_POST['name']);
	$objekt = stripslashes($_POST['objekt']);
	$zeitBeginn = stripslashes($_POST['zeit-beginn']);
	$datumBeginn = stripslashes($_POST['datum-beginn']);
	$zeitEnde = stripslashes($_POST['zeit-ende']);
	$datumEnde = stripslashes($_POST['datum-ende']);
	$rate = stripslashes($_POST['rate']);
	$preis = stripslashes($_POST['bepreisung']);	
	$phone_number   = filter_var($_POST["phone_number"], FILTER_SANITIZE_NUMBER_INT);
	$email = trim($_POST['email']);
	$myemail ="office@rentafritz.com";
	$subject = "Neue Reservierung von $name";
	$nutzerdaten = array('Kontaktdetails:',$email,$phone_number);
	$reservierung=array(
	$name,
	' würde gerne',
	' ',
	$objekt,
	' ',
	'mieten und zwar',
	' ',
	'Von:',
	$zeitBeginn,
	$datumBeginn,
	' ',
	'Bis:',
	$zeitEnde,
	$datumEnde,
	' ',
	'Bei einer Rate von:',
	$rate, '€',
	' ',
	'Ergibt sich ein Gesamtpreis von:',
	$preis, '€');
	$message =  implode("\n", $reservierung);
	$kontaktdaten =implode("\n", $nutzerdaten);
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "X-Mailer: PHP/".phpversion();
	

	
	$error = '';

	// Check name

	if(!$name){
		$error .= 'Bitte geben Sie Ihren Namen ein.<br />';
	}
	if(!isset($_POST['agb'])){
		$error .= 'Bitte akzeptieren Sie die AGB.<br />';
	}
	if(!$phone_number){
		$error .= 'Bitte geben Sie Ihre Telefonnummer ein.<br />';
	}

	if(!$email){
		$error .= 'Bitte geben Sie eine Email-Adresse ein.<br />';
	}

	if($email && !ValidateEmail($email)){
		$error .= 'Bitte geben Sie eine valide Email-Adresse ein.<br />';
	}

	if(!$error){
		$mail = mail(WEBMASTER_EMAIL, $subject, $kontaktdaten, $message, 
		"From: ".$name." <".$email.">\r\n"
		."Reply-To: ".$email."\r\n"
		."X-Mailer: PHP/" . phpversion());

		if($mail){
			echo 'OK';
		}

	}else{
		echo '<div class="notification_error">'.$error.'</div>';
	}

}
?>