<?php
include '../config.php';
session_start();


if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "staff") {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];


    $deleteBookingsSQL = "DELETE FROM bookings WHERE class_id = ?";
    $stmt1 = $conn->prepare($deleteBookingsSQL);
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
    $stmt1->close();


    $deleteClassSQL = "DELETE FROM classes WHERE id = ?";
    $stmt2 = $conn->prepare($deleteClassSQL);
    $stmt2->bind_param("i", $id);

    if ($stmt2->execute()) {
        echo "<script>alert('Class Deleted Successfully'); window.location.href='../staff_dashboard.php#content1';</script>";
    } else {
        echo "<script>alert('Error Deleting Class'); window.location.href='../staff_dashboard.php#content1';</script>";
    }

    $stmt2->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid Request'); window.location.href='staff_dashboard.php#content1';</script>";
}

?>