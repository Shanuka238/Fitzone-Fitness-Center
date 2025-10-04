<?php
session_start();
include '../config.php'; 

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "<script>alert('Please log in to submit query'); window.location.href='../login.php';</script>";
    exit();
}


$user_id = $_SESSION['user_id']; 
$subject = $_POST['subject'];
$message = $_POST['message'];


$query = "SELECT full_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($full_name, $email);
$stmt->fetch();
$stmt->close();


$query = "INSERT INTO queries (user_id, name, email, subject, message, status, created_at) VALUES (?, ?, ?, ?, ?, 'pending', NOW())";
$stmt = $conn->prepare($query);
$stmt->bind_param("issss", $user_id, $full_name, $email, $subject, $message);
if ($stmt->execute()) {
    echo "<script>alert('Query submitted successfully'); window.location.href='../customer_home.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
