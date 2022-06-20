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
        <a href="room.php">Rooms</a>
        <a class="admin_active" href="reserve.php">Reservation</a>
        <button class="outbutton" onclick="location.href='../lib/db/logout.php';"><span>Logout</span></button>
    </div>
    <!-- nav bar ends -->

    <div class="container-fluid" style="margin-top: 6em;">
        <?php
        $q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die("Connection failed: " . $conn->connect_error);
        $f_p = $q_p->fetch_array();
        $q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die("Connection failed: " . $conn->connect_error);
        $f_ci = $q_ci->fetch_array();
        ?>

        <a class="btn btn-success" href="reserve.php"><span class="badge"><?php echo $f_p['total'] ?></span> Pendings</a>
        <a class="btn btn-info disabled"><span class="badge"><?php echo $f_ci['total'] ?></span> Check In</a>
        <a class="btn btn-warning" href="checkout.php"> Check Out Logs</a>
        <br />
        <br />
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Room Type</th>
                    <th>Room no</th>
                    <th>Check In</th>
                    <th>Days</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Extra Bed</th>
                    <th>Bill</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check In'") or die("Connection failed: " . $conn->connect_error);
                while ($fetch = $query->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?></td>
                        <td><?php echo $fetch['room_type'] ?></td>
                        <td><?php echo $fetch['room_no'] ?></td>
                        <td><?php echo "<label style = 'color:#00ff00;'>" . date("M d, Y", strtotime($fetch['checkin'])) . "</label>" . " @ " . "<label>" . date("h:i a", strtotime($fetch['checkin_time'])) . "</label>" ?></td>
                        <td><?php echo $fetch['days'] ?></td>
                        <td><?php echo "<label style = 'color:#ff0000;'>" . date("M d, Y", strtotime($fetch['checkin'] . "+" . $fetch['days'] . "DAYS")) . "</label>" ?></td>
                        <td><?php echo $fetch['status'] ?></td>
                        <td><?php if ($fetch['extra_bed'] == "0") {
                                echo "None";
                            } else {
                                echo $fetch['extra_bed'];
                            } ?></td>
                        <td><?php echo "Price. " . $fetch['bill'] . ".00" ?></td>
                        <td>
                            <center><a class="btn btn-warning" href="..\lib\db\chackout_sql.php?transaction_id=<?php echo $fetch['transaction_id'] ?>" onclick="confirmationCheckin(); return false;">Check Out</a></center>
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
    function confirmationCheckin(anchor) {
        var conf = confirm("Are you sure you want to check out?");
        if (conf) {
            window.location = anchor.attr("href");
        }
    }
</script>

</html>