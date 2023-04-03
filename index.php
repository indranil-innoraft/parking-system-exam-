<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$requestedUrl = $_SERVER['REQUEST_URI'];
$arrayOfThePages = explode('/', $requestedUrl);

switch($arrayOfThePages[1]) {
  case '':
    require './application/controllers/home.php';
    break;
  case 'generateticket':
    require './application/controllers/generateTicket.php';
    break;
  case 'relasevechile':
    require './application/controllers/relaseVechile.php';
  default:
    require './application/controllers/errorPage.php';
}
