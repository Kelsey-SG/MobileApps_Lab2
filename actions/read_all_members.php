<?php
header('Content-Type: application/json');
include '../db_connect.php';

$sql = "SELECT * FROM gym_members";
$result = $conn->query($sql);

$members = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $members[] = $row;
    }
}

echo json_encode(["success" => true, "data" => $members]);
?>