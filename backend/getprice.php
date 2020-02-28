<?php
include('../products/products.php');
$answer = new stdClass();
$answer->success = true;
$answer->errors = [];
$json = file_get_contents('php://input');
$jsondata = json_decode($json);

$answer->sentData = $jsondata;
echo json_encode($answer);
