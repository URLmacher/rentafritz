<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
$answer = new stdClass();
$answer->success = true;

/**
 * check post data
 */
if (
    isset($_POST['firstName'])
    && isset($_POST['lastName'])
    && isset($_POST['phone'])
    && isset($_POST['email'])
    && isset($_POST['street'])
    && isset($_POST['hnr'])
    && isset($_POST['plz'])
    && isset($_POST['city'])
    && isset($_POST['product'])
    && isset($_POST['price'])
    && isset($_POST['duration'])
    && isset($_POST['rentStart'])
    && isset($_POST['rentEnd'])
    && isset($_FILES['file'])
) {
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $street = filter_var($_POST['street'], FILTER_SANITIZE_STRING);
    $hnr = filter_var($_POST['hnr'], FILTER_SANITIZE_STRING);
    $plz = filter_var($_POST['plz'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $product = filter_var($_POST['product'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING);
    $rentEnd = filter_var($_POST['rentEnd'], FILTER_SANITIZE_STRING);
    $rentStart = filter_var($_POST['rentStart'], FILTER_SANITIZE_STRING);

    // DEBUG
    // $answer->sentData = [
    //     'firstName' => $firstName,
    //     'lastName' => $lastName,
    //     'phone' => $phone,
    //     'email' => $email,
    //     'street' => $street,
    //     'hnr' => $hnr,
    //     'plz' => $plz,
    //     'city' => $city,
    //     'product' => $product,
    //     'price' => $price,
    //     'duration' => $duration,
    //     'rentStart' => $rentStart,
    //     'rentEnd' => $rentEnd,
    //     'file' => $_FILES['file'],
    // ];

    if (checkFile($_FILES)) {
        $answer->fileOk = true;
        if (sendMail($firstName, $lastName, $phone, $email, $street, $hnr, $plz, $city, $product, $price, $duration, $rentStart, $rentEnd, $_FILES['file'])) {
            $answer->sendMailSucces = true;
        } else {
            $answer->sendMailSucces = false;
        }
    } else {
        $answer->fileOk = false;
    }
} else {
    $answer->error = 'Keine passenden Daten übermittelt';
    $answer->success = false;
}

echo json_encode($answer);

/**
 * Checks if file is in valid format
 *
 * @param File $file
 * @return boolean
 */
function checkFile($file)
{
    $fileOk = true;

    try {
        if (
            is_array($file['file']['error']) ||
            is_array($file['file']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        switch ($file['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        if ($file['file']['size'] > 4e+6) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($file['file']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'pdf' => 'application/pdf'
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }
    } catch (RuntimeException $e) {
        $fileOk = false;
    }

    return $fileOk;
}

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
function sendMail($firstName, $lastName, $phone, $email, $street, $hnr, $plz, $city, $product, $price, $duration, $rentStart, $rentEnd, $file)
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
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $config['email-adress']; //Login
        $mail->Password = $config['email-password']; //Passwort
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress($config['email-adress']); //Empfänger
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $body;
        // Attachments
        $mail->AddAttachment(
            $file['tmp_name'],
            $file['name']
        );

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
    } catch (Exception $e) {
        $sendSuccess = false;
    }

    return $sendSuccess;
}
