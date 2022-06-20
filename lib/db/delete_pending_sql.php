<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `transaction` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die("Connection failed: " . $conn->connect_error);
	header("location: ./../../admin/reserve.php");
?>