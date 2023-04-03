<?php
require './vendor/autoload.php';
require "./config/databaseConfig.php";

if (isset($_POST['vechineNumber'])) {
  $parkingDatabase = new ParkingDatabase(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
  if ($parkingDatabase->isVechileAvailable($_POST['vechineNumber'])) {
    $parkingDatabase->changeStatus($_POST['vechineNumber']);
  }
  header('Location: /');
}
?>
