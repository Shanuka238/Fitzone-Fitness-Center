<?php
session_start();
include '../config.php';


if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST["day"];
    $class_date = $_POST["class_date"];
    $exercise = $_POST["exercise"];
    $class_date = $_POST["class_date"];
    $class_start_time = $_POST["class_start_time"];
    $class_end_time = $_POST["class_end_time"];
    $start = date("g:i A", strtotime($class_start_time));
    $end = date("g:i A", strtotime($class_end_time));
    $class_time = $start . ' - ' . $end;
    $trainer = $_POST["trainer"];

    $sql = "INSERT INTO classes (day, class_date, exercise, class_time, trainer) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $day, $class_date, $exercise, $class_time, $trainer);

    if ($stmt->execute()) {
        echo "<script>alert('Class Added Successfully'); window.location.href='../admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error Adding Class'); window.location.href='../admin_dashboard.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>