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

        <a class="btn btn-success disabled"><span class="badge"><?php echo $f_p['total'] ?></span> Pendings</a>
        <a class="btn btn-info" href="checkin.php"><span class="badge"><?php echo $f_ci['total'] ?></span> Check In</a>
        <a class="btn btn-warning" href="checkout.php"> Check Out Logs</a>
        <br />
        <br />
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Room Type</th>
                    <th>Reserved Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Pending'") or die("Connection failed: " . $conn->connect_error);
                while ($fetch = $query->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?></td>
                        <td><?php echo $fetch['contactno'] ?></td>
                        <td><?php echo $fetch['room_type'] ?></td>
                        <td><strong><?php if ($fetch['checkin'] <= date("Y-m-d", strtotime("+8 HOURS"))) {
                                        echo "<label style = 'color:#ff0000;'>" . date("M d, Y", strtotime($fetch['checkin'])) . "</label>";
                                    } else {
                                        echo "<label style = 'color:#00ff00;'>" . date("M d, Y", strtotime($fetch['checkin'])) . "</label>";
                                    } ?></strong></td>
                        <td><?php echo $fetch['status'] ?></td>
                        <td>
                            <center><a class="btn btn-success" href="confirm_reserve.php?transaction_id=<?php echo $fetch['transaction_id'] ?>"> Check In</a> <a class="btn btn-danger" onclick="confirmationDelete(); return false;" href="..\lib\db\delete_pending_sql.php?transaction_id=<?php echo $fetch['transaction_id'] ?>"> Discard</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</body>
<script src="sdsdfw.php"></script>
<script>
    $(document).ready(function() {
        $("#table").DataTable();
    });

    function confirmationDelete(anchor) {
        var conf = confirm("Are you sure you want to delete this record?");
        if (conf) {
            window.location = anchor.attr("href");
        }
    }
</script>

</html>

<!--- 

-->