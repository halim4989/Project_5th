<?php
$servername = "localhost";
$username = "aadmin";
$password = "apassword";
$dbname = "hotel5th";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



?>