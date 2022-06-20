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

        <div class="alert alert-info">Account / Create Account</div>
        <br />
        <div class="col-md-4">
            <form method="POST">
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <div class="form-group">
                    <label>Username </label>
                    <input type="text" class="form-control" name="username" />
                </div>
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" class="form-control" name="password" />
                </div>
                <br />
                <div class="form-group">
                    <button name="add_account" class="btn btn-info form-control"> Saved</button>
                </div>
            </form>
            <?php require_once '..\lib\db\add_accout_sql.php' ?>
        </div>
    </div>


</body>

</html>