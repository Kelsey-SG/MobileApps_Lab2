<?php
header('Content-Type: application/json');
include '../db_connect.php';

// Ensure the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data sent from the client
    $id = $_POST['id'];     
    $name = $_POST['name']; 
    $tier = $_POST['tier']; 

    // Prepare the UPDATE statement
    // It updates name and tier where the ID matches
    $stmt = $conn->prepare("UPDATE gym_members SET member_name = ?, membership_tier = ? WHERE id = ?");
    
    $stmt->bind_param("ssi", $name, $tier, $id);

    // Execute and check success
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Update failed"]);
    }
}
?>