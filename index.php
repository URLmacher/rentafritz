<?php
require 'vendor/autoload.php';
$router = new AltoRouter();


$router->map('GET', '/', function () {
  require __DIR__ . '/pages/home.php';
});

$router->map('GET', '', function () {
  require __DIR__ . '/pages/home.php';
});

$router->map('GET','/product/[i:id]', function () {
  require __DIR__ . '/pages/product.php';
});

$router->map('GET','/agb', function () {
  require __DIR__ . '/pages/agb.php';
});

$router->map('GET','/anfahrt', function () {
  require __DIR__ . '/pages/anfahrt.php';
});

$router->map('GET','/impressum', function () {
  require __DIR__ . '/pages/impressum.php';
});

$router->map('GET','/oeffnungszeiten', function () {
  require __DIR__ . '/pages/oeffnungszeiten.php';
});

$router->map('GET','/reservierung', function () {
  require __DIR__ . '/pages/reservierung.php';
});

$router->map('GET','/reservierung/[i:id]', function () {
  require __DIR__ . '/pages/reservierung.php';
});

$router->map('GET','/service', function () {
  require __DIR__ . '/pages/service.php';
});

$router->map('GET','/umzug', function () {
  require __DIR__ . '/pages/übersiedlungsservice.php';
});

$router->map('GET','/datenschutz', function () {
  require __DIR__ . '/pages/datenschutz.php';
});

//please remove this in production I beg you
// $router->map('GET','/test', function () {
//   require __DIR__ . '/backend/testaprice.php';
// });
// $router->map('GET','/test', function () {
//   require __DIR__ . '/backend/testamail.php';
// });


$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>
