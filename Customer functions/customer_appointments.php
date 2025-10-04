<?php
session_start();
include '../config.php'; 

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}
$user_id = $_SESSION['user_id']; 

$query = "SELECT * FROM appointments WHERE customer_id = ? ORDER BY created_at ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/Logo.png" type="image/x-icon">
    <style>
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    </style>
    <link rel="stylesheet" href="customer_appointments.css">
    <title>My Appointments - FitZone Fitness Center</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="brand">
                <img src="../Images/Logo.png" alt="Logo">
                <a href="#content">
                    <h1>FitZone Fitness Center</h1>
                </a>
            </div>
            <nav>
                <a href="../customer_home.php" class="nav-btn">Go back to home</a>
            </nav>
        </div>
    </header>

    <main>
        <div id="content">
            <div class="content">
                <h2>My Appointments</h2>
                <table id="my-appointments-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Trainer</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['full_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone_no'] . "</td>";
                                echo "<td>" . $row['trainer_name'] . "</td>";
                                echo "<td>" . $row['class_date'] . "</td>";
                                echo "<td>" . $row['class_time'] . "</td>";
                                echo "<td>" . ucfirst($row['status']) . "</td>"; 
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td><a href='delete_appointment.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this appointment?');\" class='delete-btn'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>No appointments submitted yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 FitZone Fitness Center. All rights reserved.</p>
        <nav>
            <ul class="footer-nav">
                <li><a href="#privacy">Privacy Policy</a></li>
                <li><a href="#terms">Terms of Service</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav>
        <div class="social-icons">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-youtube'></i></a>
        </div>
    </footer>
</body>
</html>
