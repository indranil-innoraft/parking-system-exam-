<?php
class ParkingDatabase extends mysqli {
  /**
   * Storing the connection to the databse.
   *
   * @var object
   */
  private $connection;
  /**
   * Creating a connection to the database.
   *
   * @param string $hostName
   * @param string $userName
   * @param string $password
   * @param string $databaseName
   *
   * @return object
   *
   */
  public function __construct (string $hostName, string $userName, string $password, string $databaseName) {
    return $this->connection = new mysqli($hostName, $userName, $password, $databaseName);
  }

  /**
   * Assign a slots.
   *
   * @param string $slotNumber
   * @param string $vechileNumber
   * @param string $vechileType
   * @param string $entryTime
   * @param string $exitTime
   * @param string $status
   *
   * @return object
   *
   */
  public function assignSlotForParking (int $slotNumber, string $vechileNumber, string $vechileType, string $entryTime, string $exitTime, string $status) {
    $sql = "insert into
    booking (
      vechile_number,
      slot_number,
      time_of_entry,
      time_of_exit,
      status,
      vechile_type
    )
    values
    (
      $vechileNumber,
      $slotNumber,
      '$entryTime',
      '$exitTime',
      $status,
      $vechileType
    );";
    return $this->connection->query($sql);
  }

   /**
    * Get numbers of solts available.
    *
    * @return object
    *
    */
   public function numberOfSlotsAvailable () {
     $sql = "select * from booking";
     return (200 - $this->connection->query($sql)->num_rows);
   }

  /**
   * Get booking details.
   *
   * @return object
   *
   */
  public function getAllBookingDetails() {
    $sql = "select * from booking";
    return (200 - $this->connection->query($sql)->fetch_all(MYSQLI_ASSOC));
  }

  /**
   * Check same car available in the parking or not.
   *
   * @param string $vechileNumber
   *
   * @return [type]
   *
   */
  public function isVechileAvailable (string $vechileNumber) {
    $sql = "select * from booking where vechile_number like $vechileNumber";
    if ($this->connection->query($sql)->num_rows != 0) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Get all booking details.
   *
   * @param string $vechileNumber
   *
   * @return object
   *
   */
  public function getBookingDetails () {
    $sql = "select * from booking";
    return ($this->connection->query($sql)->fetch_all(MYSQLI_ASSOC));
  }

  /**
   * Changing the status of the booking.
   *
   * @param string $vechileNumber
   *
   * @return object
   *
   */
  public function changeStatus (string $vechileNumber) {
    $sql = " update booking set status = 0 where vechile_number like $vechileNumber";
    return ($this->connection->query($sql));
  }

}
