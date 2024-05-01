<?php
$servername = "localhost";  // Database server, localhost if on the same server
$username = "m457g965";     // Your database username
$password = "m457g965"; // Your database password
$dbname = "m457g965";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";  // You can remove this line after confirming connection is successful
?>
