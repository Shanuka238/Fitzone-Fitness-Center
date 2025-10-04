<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $query_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];


    $sql = "DELETE FROM queries WHERE query_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $query_id, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Query deleted successfully!'); window.location.href='customer_queries.php';</script>";
    } else {
        echo "<script>alert('Failed to delete the query.'); window.location.href='customer_queries.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid Request'); window.location.href='customer_queries.php';</script>";
}

$conn->close();
?>
