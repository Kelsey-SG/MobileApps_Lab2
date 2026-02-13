<?php
// Database Credentials
$host = "localhost";
$user = "kelsey.goli"; 
$pass = "KSG@mdsql26"; 
$db   = "mobileapps_2026B_kelsey_goli"; 

// Create an instance to connect to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check if the connection failed
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]));
}
?>