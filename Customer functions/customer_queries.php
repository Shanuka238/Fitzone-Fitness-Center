<?php
session_start();
include '../config.php'; 


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    echo "<script>alert('Access Denied!'); window.location.href='../login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id']; 


$query = "SELECT * FROM queries WHERE user_id = ? AND (status = 'pending' OR status = 'answered') ORDER BY created_at ASC";
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
    <link rel="stylesheet" href="customer_queries.css">
    <title>FitZone Fitness Center</title>
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
                <h2>My Queries</h2>
                <table id="my-queries-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Response</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['query_id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['subject'] . "</td>";
                                echo "<td>" . $row['message'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "<td>" . ($row['response'] ? $row['response'] : 'No response yet') . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "<td><a href='delete_query.php?id=" . $row['query_id'] . "' onclick=\"return confirm('Are you sure you want to delete this query?');\" class='delete-btn'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No queries submitted yet.</td></tr>";
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
