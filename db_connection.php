<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "attendance_db";
$port = 3309;
// Create connection
$conn = new mysqli($host, $user, $password, $database, $port);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>