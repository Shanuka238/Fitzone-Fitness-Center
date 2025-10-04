<?php
include '../config.php'; 
session_start();

header('Content-Type: application/json');


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo json_encode([
        'success' => false,
        'message' => 'Please log in to submit a private class',
        'redirect' => 'login.php'
    ]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_SESSION["user_id"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $trainer_name = $_POST["trainer"];
    $class_date = $_POST["class_date"];
    $class_start_time = $_POST["class_start_time"];
    $class_end_time = $_POST["class_end_time"];
    $start = date("g:i A", strtotime($class_start_time));
    $end = date("g:i A", strtotime($class_end_time));
    $class_time = $start . ' to ' . $end;



    $sql = "INSERT INTO appointments (customer_id, full_name, email, phone_no, trainer_name, class_date, class_time) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $customer_id, $full_name, $email, $phone_no, $trainer_name, $class_date, $class_time);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Private class booked successfully'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error booking private class: ' . $conn->error
        ]);
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(400); 
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>