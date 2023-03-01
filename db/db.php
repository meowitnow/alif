<?php
$servername = "localhost";
$username = "test";
$password = "test123";
$db = "building";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
