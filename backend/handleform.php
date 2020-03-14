<?php
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
    && isset($_FILES['file'])
    && isset($_POST['product'])
    && isset($_POST['price'])
    && isset($_POST['duration'])
) {
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $street = filter_var($_POST['street'], FILTER_SANITIZE_STRING);
    $hnr = filter_var($_POST['hnr'], FILTER_SANITIZE_STRING);
    $plz = filter_var($_POST['plz'], FILTER_SANITIZE_STRING);
    $product = filter_var($_POST['product'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $duration = filter_var($_POST['duration'], FILTER_SANITIZE_STRING);
    $file = checkFile($_FILES);

    $answer->sentData = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'phone' => $phone,
        'email' => $email,
        'street' => $street,
        'hnr' => $hnr,
        'plz' => $plz,
        'product' => $product,
        'price' => $price,
        'duration' => $duration,
        'file' => $_FILES['file'],
    ];
} else {
    $answer->error = 'Keine passenden Daten übermittelt';
    $answer->success = false;
}

sleep(2);
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
