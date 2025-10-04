<?php
include '../config.php'; 
session_start();


header('Content-Type: application/json');


if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    echo json_encode([
        'success' => false,
        'message' => 'Please log in as an admin.',
        'redirect' => 'login.php' 
    ]);
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trainer_id = $_POST["trainer_id"] ?? '';
    $availability = $_POST["availability"] ?? '';

    
    if (!in_array($availability, ['available', 'Not available'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid availability value'
        ]);
        exit();
    }

    
    $sql = "UPDATE trainers SET availability = ? WHERE trainer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $availability, $trainer_id);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Availability updated successfully'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error updating availability: ' . $stmt->error
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