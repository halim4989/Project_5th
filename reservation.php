<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include 'config.php' ?>

  <title>Hotel Booking</title>
</head>

<body>
  <style>
    .button1 {

      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 10px 24px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      background-color: white;
      color: black;
      border: 2px solid #4CAF50;
    }

    .button1:hover {
      background-color: #4CAF50;
      color: white;
    }

    .well {
      min-height: 20px;
      padding: 19px;
      margin-bottom: 20px;
      background-color: #f5f5f5;
      border: 1px solid #e3e3e3;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }

    .well blockquote {
      border-color: #ddd;
      border-color: rgba(0, 0, 0, .15);
    }
  </style>

  <div class="topbar">

    <div class="dropdown">
      <button class="dropbtn">Make a reservation</button>
      <div class="dropdown-content">
        <a href="index.php">Home</a>
        <a href="aboutus.php">About us</a>
        <a href="contactus.php">Contact Us</a>
        <a href="gallery.php">Gallery</a>
        <a href="reservation.php">Make a reservation</a>
        <a href="rulesandregulation.php">Rules and Regulation</a>
      </div>
    </div>

    <a style="float: right; font-size: 4ex; font-style: bold; color: gray;">Online Hotel Reservation</a>

  </div>

  <div class="main  ">
    <strong>
      <h3>MAKE A RESERVATION <br></h3>
    </strong>
    <?php
    require_once 'lib/db/connect.php';
    $query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die("Connection failed: " . $conn->connect_error);
    while ($fetch = $query->fetch_array()) {
    ?>
      <div class="well" style="height:300px; width:100%;">
        <div style="float:left;">
          <img src="photo/<?php echo $fetch['photo'] ?>" height="250" width="350" />
        </div>
        <div style="float:left; margin-left:10px;">
          <h3><?php echo $fetch['room_type'] ?></h3>
          <h4 style="color:#00ff00;"><?php echo "Price/Night: " . $fetch['price'] . ".00tk" ?></h4>
          <br /><br /><br /><br /><br /><br />
          <a style="margin-left:580px;" href="add_reserve.php?room_id=<?php echo $fetch['room_id'] ?>" class="button1"> Reserve</a>
        </div>
      </div>
    <?php
    }
    ?>
  </div>


</body>

</html>