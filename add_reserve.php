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

    <div class="main w3-content w3-left">
        <strong>
            <h3>MAKE A RESERVATION <br></h3>
        </strong>

        <?php
        require_once 'lib/db/connect.php';
        $query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die("Connection failed: " . $conn->connect_error);
        $fetch = $query->fetch_array();
        ?>
        <div style="height:300px; width:800px;">
            <div style="float:left;">
                <img src="photo/<?php echo $fetch['photo'] ?>" height="300px" width="400px">
            </div>
            <div style="float:left; margin-left:10px;">
                <h3><?php echo $fetch['room_type'] ?></h3>
                <h3 style="color:#00ff00;"><?php echo "Price/Night. " . $fetch['price'] . ".00tk"; ?></h3>
            </div>
        </div>
        <br style="clear:both;" />
        <div class="well w3-col m6">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control" name="firstname" required="required" />
                </div>
                <div class="form-group">
                    <label>Middlename</label>
                    <input type="text" class="form-control" name="middlename" required="required" />
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" class="form-control" name="lastname" required="required" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" required="required" />
                </div>
                <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" class="form-control" name="contactno" required="required" />
                </div>
                <div class="form-group">
                    <label>Check in</label>
                    <input type="date" class="form-control" name="date" required="required" />
                </div>
                <br />
                <div class="form-group">
                    <button class="btn btn-success form-control" name="add_guest"> Submit</button>
                    
                </div>
            </form>
        </div>
        <div class="w3-col m4"></div>
        <?php require_once 'lib/db/add_reserve_sql.php'; ?>



    </div>



</body>

</html>