<?php
header('Content-Type: application/json');
include '../db_connect.php';

// Check if POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $tier = $_POST['tier'] ?? 'Standard'; 

    $stmt = $conn->prepare("INSERT INTO gym_members (member_name, phone, membership_tier) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $tier);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "data" => ["id" => $stmt->insert_id]]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to create record"]);
    }
    $stmt->close();
}
?>