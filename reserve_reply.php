<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include'config.php'?>

    <title>Hotel Booking</title>
</head>

<body>
    <style>
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

<div class="topbar"">
        
<div class="dropdown">
  <button class="dropbtn" >Make a reservation</button>
  <div class="dropdown-content">
    <a href = "index.php">Home</a>
    <a href = "aboutus.php">About us</a>
    <a href = "contactus.php">Contact Us</a>
    <a href = "gallery.php">Gallery</a>	
	<a href = "reservation.php">Make a reservation</a>
	<a href = "rulesandregulation.php">Rules and Regulation</a>
  </div>
</div>

<a style="float: right; font-size: 4ex; font-style: bold; color: gray;">Online Hotel Reservation</a>

</div>


<div class="main">
<strong><h3>MAKE A RESERVATION</h3></strong>
				<br>
				<div class = "w3-col m6"></div>
				<div class = "well w3-col m6">
					<center><h3>Please visit our Hotel for verification</h3></center>
					<br />
					<center><h4>THANK YOU!</h4></center>
					<br />
					<center><a href = "reservation.php" class = "btn btn-success">Back to reservation</a></center>
				</div>
				<div class = "col-md-4"></div>
</div>


</body>
</html>