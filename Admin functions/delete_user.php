<?php
include '../config.php';
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    
    if ($id == $_SESSION["user_id"]) {
        echo "<script>alert('Cannot delete yourself'); window.location.href='../admin_dashboard.php';</script>";
        exit();
    }

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('User Deleted Successfully'); window.location.href='../admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error Deleting User'); window.location.href='../admin_dashboard.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid Request'); window.location.href='../admin_dashboard.php';</script>";
}
?>