<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
  case '/':
    require __DIR__ . '/pages/index.php';
    break;
  case '':
    require __DIR__ . '/pages/index.php';
    break;
  case '/agb':
    require __DIR__ . '/pages/agb.php';
    break;
  case '/anfahrt':
    require __DIR__ . '/pages/anfahrt.php';
    break;
  case '/impressum':
    require __DIR__ . '/pages/impressum.php';
    break;
  case '/oeffnungszeiten':
    require __DIR__ . '/pages/oeffnungszeiten.php';
    break;
  case '/reservierung':
    require __DIR__ . '/pages/reservierung.php';
    break;
  case '/service':
    require __DIR__ . '/pages/service.php';
    break;
  case '/siedlservice':
    require __DIR__ . '/pages/übersiedlungsservice.php';
    break;
  default:
    http_response_code(404);
    require __DIR__ . '/views/404.php';
    break;
}
