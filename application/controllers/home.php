<?php

require "./vendor/autoload.php";
require "./config/databaseConfig.php";

$parkingDatabase = new ParkingDatabase(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
$bookingDetails = $parkingDatabase->getBookingDetails();
require "./application/views/home.php";
?>
