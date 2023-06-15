<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_restoran_memoriam";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
$hasil=mysqli_select_db($conn,$db); 
?>