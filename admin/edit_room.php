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
        <div class="alert alert-info">Transaction / Room / Change Room</div>
        <br />
        <div class="col-md-4">
            <?php
            $query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die("Connection failed: " . $conn->connect_error);
            $fetch = $query->fetch_array();
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Room Type </label>
                    <select class="form-control" required=required name="room_type">
                        <option value="">Choose an option</option>
                        <option value="Standard" <?php if ($fetch['room_type'] == "Standard") {
                                                        echo "selected";
                                                    } ?>>Standard</option>
                        <option value="Superior" <?php if ($fetch['room_type'] == "Superior") {
                                                        echo "selected";
                                                    } ?>>Superior</option>
                        <option value="Super Deluxe" <?php if ($fetch['room_type'] == "Super Deluxe") {
                                                            echo "selected";
                                                        } ?>>Super Deluxe</option>
                        <option value="Jr. Suite" <?php if ($fetch['room_type'] == "Jr. Suite") {
                                                        echo "selected";
                                                    } ?>>Jr. Suite</option>
                        <option value="Executive Suite" <?php if ($fetch['room_type'] == "Executive Suite") {
                                                            echo "selected";
                                                        } ?>>Executive Suite</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Price </label>
                    <input type="number" min="0" max="999999999" value="<?php echo $fetch['price'] ?>" class="form-control" name="price" />
                </div>
                <div class="form-group">
                    <label>Photo </label>
                    <div id="preview" style="width:150px; height :150px; border:1px solid #000;">
                        <img src="../photo/<?php echo $fetch['photo'] ?>" id="lbl" width="100%" height="100%" />
                    </div>
                    <input type="file" required="required" id="photo" name="photo" />
                </div>
                <br />
                <div class="form-group">
                    <button name="edit_room" class="btn btn-success form-control"></i> Save Changes</button>
                </div>
            </form>
            <?php require_once '..\lib\db\add_room_sql.php' ?>
        </div>
    </div>




</body>

<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>

</html>