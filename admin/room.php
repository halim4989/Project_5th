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
        <a href="home.php">Home</a>
        <a href="account.php">Accounts</a>
        <a class="admin_active" href="room.php">Rooms</a>
        <a href="reserve.php">Reservation</a>
        <button class="outbutton" onclick="location.href='../lib/db/logout.php';"><span>Logout</span></button>
    </div>

    <!-- nav bar ends -->

    <div class="container-fluid" style="margin-top: 6em;">

        <div class="alert alert-info">Transaction / Room</div>
        <a class="btn btn-success" href="add_room.php">Add Room</a>
        <br />
        <br />
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $conn->query("SELECT * FROM `room`") or die("Connection failed: " . $conn->connect_error);
                while ($fetch = $query->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $fetch['room_type'] ?></td>
                        <td><?php echo $fetch['price'] ?></td>
                        <td>
                            <center><img src="../photo/<?php echo $fetch['photo'] ?>" height="50" width="50" /></center>
                        </td>
                        <td>
                            <center><a class="btn btn-warning" href="edit_room.php?room_id=<?php echo $fetch['room_id'] ?>">Edit</a> <a class="btn btn-danger" onclick="confirmationDelete(this); return false;" href="..\lib\db\delete_room_sql.php?room_id=<?php echo $fetch['room_id'] ?>">Delete</a></center>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

<script>
    function confirmationDelete(anchor) {
        var conf = confirm("Are you sure you want to delete this record?");
        if (conf) {
            window.location = anchor.attr("href");
        }
    }
</script>

</html>