<?php
include('../products/products.php');
$answer = new stdClass();
$answer->success = true;
$json = file_get_contents('php://input');
$jsondata = json_decode($json);

/**
 * check post data
 * get price or send errors back
 */
if (isset($jsondata) && isset($jsondata->productId) && isset($jsondata->hours)) {
  $hours = $jsondata->hours;
  $productId = $jsondata->productId;

  if (is_numeric($productId) && is_numeric($hours)) {
    $product_found = false;
    foreach ($products as $product) {
      if ($product['id'] === $productId) {
        $answer->price = getPrice($product, $hours);
        $answer->product = $product['name'];
        $answer->time = $hours;
        $product_found = true;
      }
    }

    if (!$product_found) {
      $answer->error = 'Produkt nicht gefunden';
      $answer->success = false;
    }
  } else {
    $answer->error = 'Daten sind im falschen Format';
    $answer->success = false;
  }
} else {
  $answer->error = 'Keine passenden Daten übermittelt';
  $answer->success = false;
}

echo json_encode($answer);

/**
 * Calculates price for renting a product x amount of hours
 * based on the product's rate
 *
 * @param Product $product
 * @param number $hours
 * @return number
 */
function getPrice($product, $hours)
{
  $price = $product['price'];

  if ($product['rate'] === 'd') {
    $days = ceil($hours / 24);
    $price = $days * $price;
  } else if ($product['rate'] === 'h') {
    $price = $hours * $price;
  }

  return $price;
}
