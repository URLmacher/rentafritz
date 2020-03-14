<?php
$answer = new stdClass();
$answer->success = true;
$json = file_get_contents('php://input');
$jsondata = json_decode($json);

/**
 * check post data
 */
if (
    isset($jsondata)
    && isset($jsondata->firstName)
    && isset($jsondata->lastName)
    && isset($jsondata->phone)
    && isset($jsondata->email)
    && isset($jsondata->street)
    && isset($jsondata->hnr)
    && isset($jsondata->plz)
    && isset($jsondata->file)
) {
    $firstName = filter_var($jsondata->firstName, FILTER_SANITIZE_STRING);
    $lastName = filter_var($jsondata->lastName, FILTER_SANITIZE_STRING);
    $phone = filter_var($jsondata->phone, FILTER_SANITIZE_STRING);
    $email = filter_var($jsondata->email, FILTER_SANITIZE_EMAIL);
    $street = filter_var($jsondata->street, FILTER_SANITIZE_STRING);
    $hnr = filter_var($jsondata->hnr, FILTER_SANITIZE_STRING);
    $plz = filter_var($jsondata->plz, FILTER_SANITIZE_STRING);
    $file = checkFile($jsondata->file);

    $answer->sentData = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'phone' => $phone,
        'email' => $email,
        'street' => $street,
        'hnr' => $hnr,
        'plz' => $plz,
        'file' => $file,
    ];
} else {
    $answer->error = 'Keine passenden Daten übermittelt';
    $answer->success = false;
}

sleep(4);
echo json_encode($answer);

function checkFile($file)
{
    return $file;
}
