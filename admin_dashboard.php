<?php
session_start();
include 'config.php';


if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    echo "<script>alert('Access Denied!'); window.location.href='login.php';</script>";
    exit();
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
    <link rel="stylesheet" href="admin_dashboard.css">
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
            <button class="menu-btn">&#9776;</button>
            <nav>
                <ul class="navbar">
                    <li><a href="#content">Manage user<br> Accounts</a></li>
                    <li><a href="#content1">Update <br> Schedule</a></li>
                    <li><a href="#content2">Manage<br> Trainers</a></li>
                </ul>
                <a href="logout.php" class="nav-btn">Sign out</a>
            </nav>
        </div>
    </header>

    <main>
        <section id="content">
            <h2>Manage User Accounts</h2>

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php
                
                $result = $conn->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['role']}</td>
                        <td>
                            <a href='Admin functions/delete_user.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>

            <h2>Add New User</h2>
            <form action="Admin functions/add_user.php" method="POST">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="customer">Customer</option>
                    <option value="staff">Staff</option>
                </select>
                <button type="submit">Add User</button>
            </form>
        </section>



        

        <section id="content1">
            <h2>Update Schedule</h2>
            <table id="class-schedule-table" border="1">
                <tr>
                    <th>ID</th>
                    <th>Day</th>
                    <th>Date</th>
                    <th>Exercise</th>
                    <th>Time</th>
                    <th>Trainer</th>
                    <th>Actions</th>
                </tr>
                <?php
                
                $scheduleResult = $conn->query("SELECT * FROM classes");
                while ($row = $scheduleResult->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['day']}</td>
                        <td>{$row['class_date']}</td>
                        <td>{$row['exercise']}</td>
                        <td>{$row['class_time']}</td>
                        <td>{$row['trainer']}</td>
                        <td>
                            <a href='Admin functions/delete_class.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>

            <h2>Add New Class</h2>
            <form id="add-class-form" action="Admin functions/add_class.php" method="POST">
                <input type="text" name="day" placeholder="Day" required>
                <input type="date" name="class_date" required>
                <input type="text" name="exercise" placeholder="Exercise" required>
            <div style="display: flex; gap: 10px; width: 100%; margin: 10px 0;">
                <input type="time" id="class_start_time" name="class_start_time" required>
                <span style="align-self: center; color: white;">to</span>
                <input type="time" id="class_end_time" name="class_end_time" required>
            </div>
                <input type="text" name="trainer" placeholder="Trainer" required>
                <button type="submit">Add Class</button>
            </form>
        </section>

        <div id="content2">
            <section>
                <h2>Manage Trainers</h2>
                <table id="trainer-table">
                    <thead>
                        <tr>
                            <th>Trainer ID</th>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Availability</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $trainerResult = $conn->query("SELECT * FROM trainers");
                        while ($trainer = $trainerResult->fetch_assoc()) {
                            echo "<tr>
                                <td>{$trainer['trainer_id']}</td>
                                <td>{$trainer['name']}</td>
                                <td>{$trainer['specialty']}</td>
                                <td>
                                    <select onchange='updateAvailability({$trainer['trainer_id']}, this.value)'>
                                        <option value='available' " . ($trainer['availability'] == 'available' ? 'selected' : '') . ">available</option>
                                        <option value='Not available' " . ($trainer['availability'] == 'Not available' ? 'selected' : '') . ">Not available</option>
                                    </select>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
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

    <script>

function updateAvailability(trainerId, availability) {
    const formData = new FormData();
    formData.append('trainer_id', trainerId);
    formData.append('availability', availability);

    fetch('Admin functions/update_trainer_availability.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Server error: ' + response.status);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert(data.message); 
        } else if (data.redirect) {
            alert(data.message); 
            window.location.href = data.redirect; 
        } else {
            alert(data.message); 
        }
    })
    .catch(error => {
        console.error('Error updating availability:', error);
        alert('Error updating availability: ' + error.message);
    });
}
     
    </script>
</body>

</html>
