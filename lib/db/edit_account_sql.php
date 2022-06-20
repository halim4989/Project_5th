<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_account'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn->query("UPDATE `admin` SET `name` = '$name', `username` = '$username', `password` = '$password' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die("Connection failed: " . $conn->connect_error);
		header("location:./../../admin/account.php");
	}	