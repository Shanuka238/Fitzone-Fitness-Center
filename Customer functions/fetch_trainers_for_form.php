<?php
include '../config.php'; 

session_start();

error_log("User ID: " . $_SESSION["user_id"]);
error_log("User Role: " . $_SESSION["role"]);

if (!isset($_SESSION["user_id"])) {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(['error' => 'Access Denied']);
    exit();
}


$sql = "SELECT name, specialty FROM trainers";
$result = $conn->query($sql);

$trainers = [];
while ($row = $result->fetch_assoc()) {
    $trainers[] = $row;
}

header('Content-Type: application/json');
echo json_encode($trainers);

$conn->close();
?>