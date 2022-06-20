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
        <a class="admin_active" href="account.php">Accounts</a>
        <a href="room.php">Rooms</a>
        <a href="reserve.php">Reservation</a>
        <button class="outbutton" onclick="location.href='../lib/db/logout.php';"><span>Logout</span></button>
    </div>
    <!-- nav bar ends -->

    <div class="container-fluid" style="margin-top: 6em;">
        <div class="alert alert-info">Accounts</div>
        <a class="btn btn-success" href="add_account.php"> Create New Account</a>
        <br />
        <br />
        <table id="table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $conn->query("SELECT * FROM `admin`") or die("Connection failed: " . $conn->connect_error);
                while ($fetch = $query->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $fetch['name'] ?></td>
                        <td><?php echo $fetch['username'] ?></td>
                        <td><?php echo md5($fetch['password']) ?></td>
                        <td>
                            <center><a class="btn btn-warning" href="edit_account.php?admin_id=<?php echo $fetch['admin_id'] ?>"> Edit</a> <a class="btn btn-danger" onclick="confirmationDelete(this); return false;" href="..\lib\db\delete_account_sql.php?admin_id=<?php echo $fetch['admin_id'] ?>"> Delete</a></center>
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




    $(document).ready(function() {
        $("#table").DataTable();
    });
</script>

</html>