<?php
header('Content-Type: application/json');
include '../db_connect.php';

// Ensure the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID of the record to delete
    $id = $_POST['id'];

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM gym_members WHERE id = ?");
    
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        // Return success message
        echo json_encode(["success" => true]);
    } else {
        // Return error message
        echo json_encode(["success" => false, "error" => "Delete failed"]);
    }
}
?>