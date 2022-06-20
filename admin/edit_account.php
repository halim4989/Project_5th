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
        <div class="alert alert-info">Account / Change Account</div>
        <?php
        $query = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die("Connection failed: " . $conn->connect_error);
        $fetch = $query->fetch_array();
        ?>
        <br />
        <div class="col-md-4">
            <form method="POST" action="..\lib\db\edit_account_sql.php?admin_id=<?php echo $fetch['admin_id'] ?>">
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" class="form-control" value="<?php echo $fetch['name'] ?>" name="name" />
                </div>
                <div class="form-group">
                    <label>Username </label>
                    <input type="text" class="form-control" value="<?php echo $fetch['username'] ?>" name="username" />
                </div>
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" class="form-control" value="<?php echo $fetch['password'] ?>" name="password" />
                </div>
                <br />
                <div class="form-group">
                    <button name="edit_account" class="btn btn-warning form-control"><i class="glyphicon glyphicon-edit"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>