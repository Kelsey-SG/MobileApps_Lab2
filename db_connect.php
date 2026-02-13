<?php
$host = "localhost";
$user = "kelsey.goli"; 
$pass = "KSG@mdsql26"; 
$db   = "mobileapps_2026B_kelsey_goli"; 
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]));
}
?>