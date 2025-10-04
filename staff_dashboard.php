<?php
session_start();
include 'config.php'; 

if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "staff") {
    echo "<script>alert('Access Denied!'); window.location.href='login.php';</script>";
    exit();
}


$appointmentsResult = mysqli_query($conn, "SELECT * FROM appointments WHERE status = 'pending'");
$scheduleResult = mysqli_query($conn, "SELECT * FROM classes");
$queriesResult = mysqli_query($conn, "SELECT * FROM queries WHERE status = 'pending'");
$trainersResult = mysqli_query($conn, "SELECT * FROM trainers");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    </style>
    <link rel="shortcut icon" href="Images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="staff_dashboard.css">
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
                    <li><a href="#content">Manage<br> queries</a></li>
                    <li><a href="#content1">Update <br> Schedule</a></li>
                    <li><a href="#content2">Manage <br> Appointments</a></li>
                    <li><a href="#content3">Trainers <br> availability</a></li>
                </ul>
                <a href="logout.php" class="nav-btn">Sign out</a>
            </nav>
        </div>
    </header>

    <main>
        <div id="content">
            <div class="content">
                <h2>Manage Queries</h2>
                <table id="query-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Response</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (mysqli_num_rows($queriesResult) > 0): ?>
    <?php while ($query = mysqli_fetch_assoc($queriesResult)): ?>
        <tr>
            <td><?= $query['query_id'] ?></td>
            <td><?= $query['name'] ?></td>
            <td><?= $query['email'] ?></td>
            <td><?= $query['subject'] ?></td>
            <td><?= $query['message'] ?></td>
            <td><?= $query['status'] ?></td>
            <td>
                <?php if ($query['status'] == 'pending'): ?>
                    <form action="Staff functions/respond_query.php" method="POST">
                        <textarea name="response" placeholder="Enter your response here" required></textarea>
                        <input type="hidden" name="query_id" value="<?= $query['query_id'] ?>">
                        <button type="submit">Respond</button>
                    </form>
                <?php else: ?>
                    <span><?= $query['response'] ?></span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="7" class="no-records">No queries available</td>
    </tr>
<?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div id="content1">
            <div class="content1">
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
                    <?php while ($class = mysqli_fetch_assoc($scheduleResult)): ?>
                        <tr>
                            <td><?= $class['id'] ?></td>
                            <td><?= $class['day'] ?></td>
                            <td><?= $class['class_date'] ?></td>
                            <td><?= $class['exercise'] ?></td>
                            <td><?= $class['class_time'] ?></td>
                            <td><?= $class['trainer'] ?></td>
                            <td>
                                <a href="Staff functions/delete_class2.php?id=<?= $class['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>

                <h2>Add New Class</h2>
                <form id="add-class-form" action="Staff functions/add_class2.php" method="POST">
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
            </div>
        </div>

        <div id="content2">
            <div class="content2">
                <h2>Manage Appointments</h2>
                <table id="appointment-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Trainer Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if (mysqli_num_rows($appointmentsResult) > 0):
        while ($appointment = mysqli_fetch_assoc($appointmentsResult)): ?>
            <tr>
                <td><?= $appointment['id'] ?></td>
                <td><?= $appointment['full_name'] ?></td>
                <td><?= $appointment['email'] ?></td>
                <td><?= $appointment['phone_no'] ?></td>
                <td><?= $appointment['trainer_name'] ?></td>
                <td><?= $appointment['class_date'] ?></td>
                <td><?= $appointment['class_time'] ?></td>
                <td><?= $appointment['status'] ?></td>
                <td>

                    <form action="Staff functions/manage_appointment.php" method="POST" style="display:inline;">
                        <input type="hidden" name="appointment_id" value="<?= $appointment['id'] ?>">
                        <input type="hidden" name="action" value="approve">
                        <button type="submit" class="approve-btn">Approve</button>
                    </form>
                    <form action="Staff functions/manage_appointment.php" method="POST" style="display:inline;">
                        <input type="hidden" name="appointment_id" value="<?= $appointment['id'] ?>">
                        <input type="hidden" name="action" value="reject">
                        <button type="submit" class="reject-btn">Reject</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; 
    else: ?>
        <tr>
            <td colspan="9" class="no-records">No pending appointments</td>
        </tr>
    <?php endif; ?>
</tbody>
                </table>
            </div>
        </div>


        <div id="content3">
            <div class="content3">
                <h2>Trainers availability</h2>
                <table id="class-schedule-table" border="1">
                    <tr>
                    <th>Trainer ID</th>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>experience</th>
                            <th>Availability</th>
                        </tr>
                    </tr>
                    <?php while ($class = mysqli_fetch_assoc($trainersResult)): ?>
                        <tr>
                            <td><?= $class['trainer_id'] ?></td>
                            <td><?= $class['name'] ?></td>
                            <td><?= $class['specialty'] ?></td>
                            <td><?= $class['experience'] ?></td>
                            <td><?= $class['availability'] ?></td>
                        </tr>
                    <?php endwhile; ?>
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
