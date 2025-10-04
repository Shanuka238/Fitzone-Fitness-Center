<?php
session_start();
include '../config.php';


header('Content-Type: application/json');


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo json_encode([
        'success' => false,
        'message' => 'Please log in to book a class',
        'redirect' => 'login.php'
    ]);
    exit();
}


$user_id = $_SESSION['user_id'];
$class_id = $_POST['class_id'];


$checkQuery = "SELECT * FROM bookings WHERE user_id = ? AND class_id = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("ii", $user_id, $class_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'You have already booked this class.'
    ]);
    exit();
}


$insertQuery = "INSERT INTO bookings (user_id, class_id) VALUES (?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ii", $user_id, $class_id);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Class booked successfully!'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error booking class: ' . $conn->error
    ]);
}

$stmt->close();
$conn->close();
?>