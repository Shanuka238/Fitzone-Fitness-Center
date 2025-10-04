<?php
session_start();
include '../config.php';

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
    $role = $_POST["role"];

    
    $check = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Email already exists'); window.location.href='../admin_dashboard.php';</script>";
        exit();
    }

    $sql = "INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('User Added Successfully'); window.location.href='../admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error Adding User'); window.location.href='../admin_dashboard.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>