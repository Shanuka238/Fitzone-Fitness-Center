<?php
ob_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


session_unset();  
session_destroy();  


ob_end_flush();
echo "<script>alert('Logged out successfully'); window.location.href='Home.php';</script>";
exit();
?>