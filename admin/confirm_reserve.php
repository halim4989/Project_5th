<!DOCTYPE html>
<?php require_once "../lib/db/connect.php" ?>
<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location:index.php");
}


$query = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die("Connection failed: " . $conn->connect_error);
$fetch = $query->fetch_array();
$name = $fetch['name'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'config.php' ?>
    <title>Hotel Booking</title>
</head>

<body>
    <div class="admin_navbar">
        <a class="admin_active" href="home.php">Home</a>
        <a href="account.php">Accounts</a>
        <a href="room.php">Rooms</a>
        <a href="reserve.php">Reservation</a>
        <button class="outbutton" onclick="location.href='../lib/db/logout.php';"><span>Logout</span></button>
    </div>
    <!-- nav bar ends -->

    <div class="container-fluid" style="margin-top: 6em;">


        <div class="alert alert-info">Fill up form</div>
        <?php
        $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die("Connection failed: " . $conn->connect_error);
        $fetch = $query->fetch_array();
        ?>
        <br />
        <form method="POST" enctype="multipart/form-data" action="..\lib\db\confirm_checkin_sql.php?transaction_id=<?php echo $fetch['transaction_id'] ?>">
            <div class="form-inline" style="float:left;">
                <label>Firstname</label>
                <br />
                <input type="text" value="<?php echo $fetch['firstname'] ?>" class="form-control" size="40" disabled="disabled" />
            </div>
            <div class="form-inline" style="float:left; margin-left:20px;">
                <label>Middlename</label>
                <br />
                <input type="text" value="<?php echo $fetch['middlename'] ?>" class="form-control" size="40" disabled="disabled" />
            </div>
            <div class="form-inline" style="float:left; margin-left:20px;">
                <label>Lastname</label>
                <br />
                <input type="text" value="<?php echo $fetch['lastname'] ?>" class="form-control" size="40" disabled="disabled" />
            </div>
            <br style="clear:both;" />
            <br />
            <div class="form-inline" style="float:left;">
                <label>Room Type</label>
                <br />
                <input type="text" value="<?php echo $fetch['room_type'] ?>" class="form-control" size="20" disabled="disabled" />
            </div>
            <div class="form-inline" style="float:left; margin-left:20px;">
                <label>Room No</label>
                <br />
                <input type="number" min="0" max="999" name="room_no" class="form-control" required="required" />
            </div>
            <div class="form-inline" style="float:left; margin-left:20px;">
                <label>Days</label>
                <br />
                <input type="number" min="0" max="99" name="days" class="form-control" required="required" />
            </div>
            <div class="form-inline" style="float:left; margin-left:20px;">
                <label>Extra Bed</label>
                <br />
                <input type="number" min="0" max="99" name="extra_bed" class="form-control" />
            </div>
            <div class="form-inline" style="float:left; margin-left:20px;">
                <label style="color:#ff0000;">*Extra Bed cost 800</label>
            </div>
            <br style="clear:both;" />
            <br />
            <button name="add_form" class="btn btn-primary">Submit</button>
        </form>
    </div>

    </div>



</body>

</html>