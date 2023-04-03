<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vechile Parking System</title>
  <link rel="stylesheet" href="public/assets/css/home.css">
</head>

<body>
  <section class="available-section">
    <h2>Available Parking</h2>
    <hr>
    <div class="solts">
      <div class="slots-1">
        <h3>Slots for 2 wheeler :</h3>
        <p class="4-wheelers-solts-number">100</p>
      </div>
      <div class="slots-1">
        <h3>Slots for 4 wheeler :</h3>
        <p class="4-wheelers-solts-number">100</p>
      </div>
    </div>
  </section>
  <section class="tickets">
    <h2>Tickets</h2>
    <table id="customers">
      <tr>
        <th>Slot number</th>
        <th>Vehicle number</th>
        <th>Time of entry</th>
        <th>Time of exit </th>
        <th>Status</th>
      </tr>
      <?php for ($i = 0; $i < count($bookingDetails); $i++) { ?>
        <tr>
          <td><?php echo $bookingDetails[$i]['slot_number']; ?></td>
          <td><?php echo $bookingDetails[$i]['vechile_number']; ?></td>
          <td><?php echo $bookingDetails[$i]['time_of_entry']; ?></td>
          <td><?php echo $bookingDetails[$i]['time_of_exit']; ?></td>
          <td><?php if ($bookingDetails[$i]['status'] == 1) {
                echo "booked";
              } else {
                echo "Relased";
              } ?>
          </td>
        </tr>
      <?php } ?>
    </table>
    <hr>
  </section>
  <section class="Generate-ticket">
    <h2>Generate Ticket Now</h2>
    <hr>
    <form action="generateticket" method="post">
      <div class="vechine-number">
        <label for="vechineNumber">Vechine Number</label>
        <input id="vechileNumver" type="text" name="vechineNumber" required>
      </div>
      <div class="type-of-vechile">
        <label for="vechileType">Vechine Type 2/4</label>
        <input id="vechileType" type="text" name="vechileType" required>
      </div>
      <button id="generateTicket">Generate Ticket</button>
    </form>
  </section>
  <section class="relase-vechile">
    <h2>Relaseing from</h2>
    <hr>
    <form action="relasevechile" method="post">
      <div class="vechine-number">
        <label for="vechineNumber">Vechine Number</label>
        <input type="text" name="vechineNumber">
      </div>
      <button id="relase-btn">Relase Now</button>
    </form>
  </section>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="./public/assets/js/home.js"></script>
</html>
