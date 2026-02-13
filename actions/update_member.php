<?php
header('Content-Type: application/json');
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tier = $_POST['tier'];

    $stmt = $conn->prepare("UPDATE gym_members SET member_name = ?, membership_tier = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $tier, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Update failed"]);
    }
}
?>