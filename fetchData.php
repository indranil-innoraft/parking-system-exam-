<?php

require "./config/databaseConfig.php";
require "./database/ParkingDatabase.php";

$parkingDatabase = new ParkingDatabase(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
$bookingDetails = $parkingDatabase->getBookingDetails();
?>
