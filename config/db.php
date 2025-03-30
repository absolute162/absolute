<?php
$servername = "sql210.infinityfree.com";
$username = "if0_38638378";
$password = "AkenjgX5Jyz";
$dbname = "if0_38638378_absolute";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>