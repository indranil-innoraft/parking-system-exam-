<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// require "/vendor/autoload.php";
require "./config/databaseConfig.php";
require "./database/ParkingDatabase.php";

if (isset($_POST['vechineNumber']) && isset($_POST['vechileType'])) {
  $parkingDatabase = new ParkingDatabase(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
  if ($parkingDatabase->isVechileAvailable($_POST['vechineNumber'])) {
    $response['status'] = false;
    echo json_encode($response);
  }
  date_default_timezone_set("Asia/Calcutta");
  $timeZone = date_default_timezone_get();
  $entry_time = date('H:i:s');
  $exit_time = date('H:i:s', strtotime('+2 hour', strtotime($entry_time)));
  $status = 1;
  $slot_number = $parkingDatabase->numberOfSlotsAvailable();
  $parkingDatabase->assignSlotForParking ($slot_number, $_POST['vechineNumber'], $_POST['vechileType'], $entry_time, $exit_time, $status);
  $response['status'] = true;
  echo json_encode($response);
  header('Location: /index.php');
}
?>
