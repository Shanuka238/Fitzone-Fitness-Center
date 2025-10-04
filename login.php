<?php
session_start();
include 'config.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $role = htmlspecialchars(trim($_POST["role"]));

    
    $sql = "SELECT * FROM users WHERE email = ? AND role = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user["password"])) {
            
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["full_name"] = $user["full_name"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["login_time"] = time(); 

            
            if ($role === "customer") {
                echo "<script>alert('Login Successful! Redirecting to Customer Home'); window.location.href='customer_home.php';</script>";
            } elseif ($role === "staff") {
                echo "<script>alert('Login Successful! Redirecting to Staff Dashboard'); window.location.href='staff_dashboard.php';</script>";
            } elseif ($role === "admin") {
                echo "<script>alert('Login Successful! Redirecting to Admin Dashboard'); window.location.href='admin_dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid Password. Please try again.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found or incorrect role selected. Please register first.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Images/Logo.png" type="image/x-icon">
    <style>
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    </style>
    <link rel="stylesheet" href="Login.css">
    <script src="script.js"></script>
    <title>FitZone Fitness Center</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="brand">
                <img src="Images/Logo.png" alt="Logo">
                <a href="#content">
                    <h1>FitZone Fitness Center</h1>
                </a>
            </div>
            <nav>
                <a href="#" class="nav-btn">Welcome to Fitzone</a>
            </nav>
        </div>
    </header>

    <div class="form-container">
        <div class="form-box hidden" id="login-box">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="input-box">
                    <i class='bx bx-envelope'></i>
                    <input type="email" id="login-email" name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <i class='bx bx-lock'></i>
                    <input type="password" id="login-password" name="password" placeholder="Password" required>
                    <i class='bx bx-show password-toggle' onclick="togglePassword('login-password', this)"></i>
                </div>

                <div class="input-box">
                    <i class='bx bx-user-circle'></i>
                    <select id="login-role" name="role" required>
                        <option value="customer">Customer</option>
                        <option value="staff">Staff</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit">Login</button>
                <p>Don't have an account? <a href="register.php" onclick="toggleForms()">Register</a></p>
            </form>
        </div>
    </div>

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