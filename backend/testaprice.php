<?php

/**
 * Calculates price for renting a product x amount of hours
 * based on the product's rate
 *
 * @param Product $product
 * @param number $hours
 * @return number
 */
function getPrice($price, $rate, $hours)
{

  switch ($rate) {
    case 'd':
      $days = floor($hours / 24); //
      echo 'days: ' . $days . '<br>';
      $remainingHours = ceil($hours % 24);
      echo 'hours: ' . $remainingHours . '<br>';
      if ($remainingHours < 12) {
        $hourlyRate = round(($price / 24), 2);
        $surcharge = round((($hourlyRate / 100) * 30), 2);
        echo 'pro stunde: ' . $hourlyRate . '<br>';
        echo '30%: ' . $surcharge . '<br>';
        $thresholdPrice = $hourlyRate + $surcharge;
        echo 'preis mit ausschlag: ' . $thresholdPrice . '<br>';
        $price = ($days * $price) + ($remainingHours * $thresholdPrice);
      } else {
        $days = ceil($hours / 24);
        $price = $days * $price;
      }
      break;
    case '12':
      $totalTime = floor($hours / 12);
      $remainingHours = ceil($hours % 12);
      if ($remainingHours < 6) {
        $hourlyRate = $price / 12;
        $surcharge = ($hourlyRate / 100) * 30;
        $thresholdPrice = $hourlyRate + $surcharge;
        $price = ($totalTime * $price) + ($remainingHours + $thresholdPrice);
      } else {
        $twelves = ceil($hours / 12);
        $price = $twelves * $price;
      }
      break;
    case 'h':
      $price = $hours * $price;
      break;
  }

  return $price;
}
function getPricen($price, $rate, $hours)
{

  switch ($rate) {
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


for ($i = 0; $i < 72; $i++) {
  echo 'Berechnung ' . $i . ' Stunden: ' . getPricen(10, '12', $i) . '<br/><br/>';
}
