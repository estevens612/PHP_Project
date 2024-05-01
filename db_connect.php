<?php
$servername = "localhost";  // Database server, localhost 
$username = "m457g965";     // database username
$password = "m457g965"; // database password
$dbname = "m457g965";       // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";  
?>
