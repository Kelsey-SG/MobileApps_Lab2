<?php
header('Content-Type: application/json');
include '../db_connect.php';

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to find the member with this ID
    $stmt = $conn->prepare("SELECT * FROM gym_members WHERE id = ?");
    
    $stmt->bind_param("i", $id);
    
    $stmt->execute();
   
    $result = $stmt->get_result();

    // Check if a record was found
    if ($row = $result->fetch_assoc()) {
        // Return the single record data
        echo json_encode(["success" => true, "data" => $row]);
    } else {
        // Return error if ID doesn't exist
        echo json_encode(["success" => false, "error" => "not found"]);
    }
} else {
    // Return error if no ID was provided in the URL
    echo json_encode(["success" => false, "error" => "ID required"]);
}
?>