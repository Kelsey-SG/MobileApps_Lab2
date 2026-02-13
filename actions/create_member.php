<?php
header('Content-Type: application/json');
include '../db_connect.php';

// Checks if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $tier = $_POST['tier'] ?? 'Standard'; 

    // Prepares the SQL statement
    $stmt = $conn->prepare("INSERT INTO gym_members (member_name, phone, membership_tier) VALUES (?, ?, ?)");
    
    $stmt->bind_param("sss", $name, $phone, $tier);

    // Executes the query and check if it was successful
    if ($stmt->execute()) {
        // Returns success with the new ID if insertion succeeded
        echo json_encode(["success" => true, "data" => ["id" => $stmt->insert_id]]);
    } else {
        // Returns error if insertion failed
        echo json_encode(["success" => false, "error" => "Failed to create record"]);
    }
    
    $stmt->close();
}
?>