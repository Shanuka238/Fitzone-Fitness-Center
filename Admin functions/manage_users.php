<?php
include '../config.php';
session_start();


if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    echo "<script>alert('Access Denied! Redirecting to Home.'); window.location.href='../login.php';</script>";
    exit();
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<h2>Manage User Accounts</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["full_name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["role"]; ?></td>
        <td>
            
            <a href='delete_user.php?id=<?php echo $row['id']; ?>' class='delete-btn' onclick='return confirm("Are you sure?")'>Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<h2>Add New User</h2>
<form action="add_user.php" method="POST">
    <input type="text" name="full_name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="role" required>
        <option value="customer">Customer</option>
        <option value="staff">Staff</option>
    </select>
    <button type="submit">Add User</button>
</form>

<?php $conn->close(); ?>
