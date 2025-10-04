<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];


    $sql = "DELETE FROM appointments WHERE id = ? AND customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $appointment_id, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Appointment deleted successfully!'); window.location.href='customer_appointments.php';</script>";
    } else {
        echo "<script>alert('Failed to delete appointment.'); window.location.href='customer_appointments.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='customer_appointments.php';</script>";
}

$conn->close();
?>
