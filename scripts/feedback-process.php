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
	$check = isset($_POST['agb']);
    $error = '';

    // Check name

    if(!$name) {
        $error .= 'Bitte geben Sie Ihren Namen ein.<br />';
    }

    if(!$error) {
        $mail = mail(WEBMASTER_EMAIL, 'Feedback',
            "X-Mailer: PHP/" . phpversion());
        
        if($mail)
        {
            echo 'OK';
        }
    } else {
        echo '<div class="notification_error">'.$error.'</div>';
    }
}
?>