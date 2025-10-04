<?php
session_start();
include '../config.php'; 

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'staff') {
    echo "<script>alert('Please log in as staff'); window.location.href='../login.php';</script>";
    exit();
}


if (!isset($_SESSION['user_id'])) {
    echo "Staff member not logged in";
    exit();
}

$user_id = $_SESSION['user_id']; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query_id = $_POST['query_id'];
    $response = $_POST['response']; 

    
    $stmt = $conn->prepare("UPDATE queries SET response = ?, status = 'answered' WHERE query_id = ?");
$stmt->bind_param("si", $response, $query_id);

    if ($stmt->execute()) {
        echo "<script>alert('Respond submitted'); window.location.href='../staff_dashboard.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
