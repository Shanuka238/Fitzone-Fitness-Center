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


$sql = "SELECT * FROM classes";
$result = $conn->query($sql);

$classes = [];
while ($row = $result->fetch_assoc()) {
    $classes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($classes);

$conn->close();
?>
