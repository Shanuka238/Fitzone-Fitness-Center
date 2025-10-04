<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $checkSql = "SELECT id FROM users WHERE email = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "<script>
                alert('This email is already registered. Please use another one or login.');
                window.history.back();
              </script>";
        $checkStmt->close();
        $conn->close();
        exit();
    }

    $checkStmt->close();

    // Proceed to insert the new user
    $sql = "INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registration successful! Redirecting to login');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to register. Please try again.');
                window.history.back();
              </script>";
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
    <title>FitZone Fitness Center</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="brand">
                <img src="Images/Logo.png" alt="Logo">
                <a href=#content>
                    <h1>FitZone Fitness Center</h1>
                </a>
            </div>
            <nav>
                
            <a href="#" class="nav-btn">Welcome to Fitzone</a>
            </nav>
        </div>
    </header>
    <script src="script.js"></script>


    <div class="form-container">
        <div class="form-box" id="register-box">
            <h2>Register</h2>
            <form action="register.php" method="POST">

                <div class="input-box">
                    <i class='bx bx-user'></i>
                    <input type="text" id="reg-name" name="name" placeholder="Full Name" required>
                </div>

                <div class="input-box">
                    <i class='bx bx-envelope'></i>
                    <input type="email" id="reg-email" name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <i class='bx bx-lock'></i>
                    <input type="password" id="reg-password" name="password" placeholder="Password" required>
                    <i class='bx bx-show password-toggle' onclick="togglePassword('reg-password', this)"></i>
                </div>

                <div class="input-box">
                    <i class='bx bx-user-circle'></i>
                    <select id="reg-role" name="role" required>
                        <option value="customer">Customer</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <button type="submit">Register</button>
                <p>Already have an account? <a href="login.php" onclick="toggleForms()">Login</a></p>
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