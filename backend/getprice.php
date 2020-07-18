<?php
include('../products/products.php');
include('../products/options.php');
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
  $option = getOption($jsondata->optionId, $options);

  if (is_numeric($productId) && is_numeric($hours)) {
    $product_found = false;
    foreach ($products as $product) {
      if ($product['id'] === $productId) {
        $answer->price = getPrice($product, $hours, $option);
        $answer->product = $product['name'];
        $answer->option = $option['description'];
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
 * @param Option|null $optionId
 * @return number
 */
function getPrice($product, $hours, $option)
{
  $price = $product['price'];

  if ($option) {
    $price += $option['price'];
  }

  switch ($product['rate']) {
    case 'd':
      $price = getThresholdPrice($price, $hours, 24);
      break;
    case '12':
      $price = getThresholdPrice($price, $hours, 12);
      break;
    case 'h':
      $price = $hours * $price;
      break;
  }

  return $price;
}

/**
 * there is a threshold for when remainding hours are
 * less than half of the total rate.
 * this threshold-price is used instead of rounding to the full rate
 *
 * @param number $price
 * @param number $hours
 * @param number $totalRate
 * @return number
 */
function getThresholdPrice($price, $hours, $totalRate)
{
  $actualPrice = 0;

  $timeUnits = floor($hours / $totalRate);
  $remainingHours = ceil($hours % $totalRate);

  if ($remainingHours < ($totalRate / 2)) {
    $hourlyRate = round(($price / $totalRate), 2);
    $surcharge = round((($hourlyRate / 100) * 30), 2);
    $thresholdPrice = $hourlyRate + $surcharge;
    $actualPrice = ($timeUnits * $price) + ($remainingHours * $thresholdPrice);
  } else {
    $timeUnits = ceil($hours / $totalRate);
    $actualPrice = $timeUnits * $price;
  }

  return $actualPrice;
}


function getOption($optionId, $options)
{
  $option = null;
  foreach ($options as $o) {
    if ($o['id'] === $optionId) {
      $option = $o;
    }
  }
  return $option;
}
