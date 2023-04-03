<?php

require "./vendor/autoload.php";
require "./config/databaseConfig.php";

if (isset($_POST['vechineNumber']) && isset($_POST['vechileType'])) {
  $parkingDatabase = new ParkingDatabase(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
  if ($parkingDatabase->isVechileAvailable($_POST['vechineNumber'])) {
    header('Location: /');
  }
  date_default_timezone_set("Asia/Calcutta");
  $timeZone = date_default_timezone_get();
  $entry_time = date('H:i:s');
  $exit_time = date('H:i:s', strtotime('+2 hour', strtotime($entry_time)));
  $status = 1;
  $slot_number = $parkingDatabase->numberOfSlotsAvailable();
  $parkingDatabase->assignSlotForParking ($slot_number, $_POST['vechineNumber'], $_POST['vechileType'], $entry_time, $exit_time, $status);
  header('Location: /');
}
?>
