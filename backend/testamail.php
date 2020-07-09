<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'] .'/vendor/autoload.php';

/**
 * send all data as email
 *
 * @param string $firstName
 * @param string $lastName
 * @param string $phone
 * @param string $email
 * @param string $street
 * @param string $hnr
 * @param string $plz
 * @param string $city
 * @param string $product
 * @param string $price
 * @param string $duration
 * @param string $rentStart
 * @param string $rentEnd
 * @param File $file
 * @return boolean
 */
function sendMail($firstName, $lastName, $phone, $email, $street, $hnr, $plz, $city, $product, $price, $duration, $rentStart, $rentEnd)
{

  $sendSuccess = true;
  $mail = new PHPMailer(true);
  $config = include_once('CONFIG.php');
  $name = $firstName . ' ' . $lastName;
  $subject = 'Reservierungsanfrage von ' . $name;
  $bodyHeadline = "<b>Mietanfrage für $product</b>\r\n";
  $bodyRent = "<b>Von: </b>$rentStart\r\n<b>Bis: </b>$rentEnd\r\n<b>Dauer: </b>$duration\r\n<b>Preis: </b>$price\r\n";
  $bodyCustomer = "<b>Anfrage von: </b>\r\n$firstName $lastName\r\nTel: $phone\r\nEmail: $email\r\n$street $hnr\r\n$plz $city";
  $body = nl2br("$bodyHeadline \r\n$bodyRent \r\n$bodyCustomer");

  try {
    // $mail->isSMTP();
    $mail->Host = $config['host'];
    $mail->Port = $config['port'];
    // $mail->SMTPAuth = true;
    // $mail->Username = $config['email-address']; //Login
    // $mail->Password = $config['email-password']; //Passwort
    // $mail->SMTPSecure = 'tls';


    $mail->setFrom($config['email-address'], $name);
    $mail->addAddress($config['email-address']); //Empfänger
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = $body;


    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
  } catch (Exception $e) {
    print_r($e);
    $sendSuccess = false;
  }

  return $sendSuccess;
}
echo '<pre>';
sendMail('Patrick', 'Durlinger', '066404555', 'durlacher@live.at', 'gaystreet', '45', '8275', 'Graz', 'Produkt', '300','5', 'morgen', 'mittwoch');