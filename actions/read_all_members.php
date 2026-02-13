<?php
header('Content-Type: application/json');
include '../db_connect.php';

// SQL query to select all columns from the table
$sql = "SELECT * FROM gym_members";
$result = $conn->query($sql);

// Initialize an array to hold the data
$members = [];

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row and add it to the members array
    while($row = $result->fetch_assoc()) {
        $members[] = $row;
    }
}

echo json_encode(["success" => true, "data" => $members]);
?>