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


    <div class="w3-content" style="max-width:1100px; margin-top: 12em;">
        <div class="w3-card" style="width:80%">
            <img src="../lib/img/photo/back.jpg" alt="Person" style="width:100%">
            <div class="w3-container">
                <h4><b>Administrator</b></h4>
                <p>The other boss</p>
            </div>
        </div>


    </div>

</body>

</html>