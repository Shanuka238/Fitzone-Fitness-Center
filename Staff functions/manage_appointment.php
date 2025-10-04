<?php
include '../config.php'; 
session_start();


error_log("User ID: " . $_SESSION["user_id"]);
error_log("User Role: " . $_SESSION["role"]);

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'staff') {
    echo "<script>alert('Please log in as staff'); window.location.href='../login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = $_POST["appointment_id"];
    $action = $_POST["action"]; 

    $status = ($action === 'approve') ? 'approved' : 'rejected';
    $sql = "UPDATE appointments SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $appointment_id);

    if ($stmt->execute()) {
        $message = ($status === 'approved') ? 'Appointment Approved' : 'Appointment Rejected';
        echo "<script>alert('$message'); window.location.href='../staff_dashboard.php#content2';</script>";
    } else {
        echo "<script>alert('Error updating appointment status'); window.location.href='../staff_dashboard.php#content2';</script>";
    }
    

    $stmt->close();
    $conn->close();
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request method']);
}
?>