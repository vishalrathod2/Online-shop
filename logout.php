<?php
session_start();
if (isset($_SESSION['login'])) {
    // Clear session data
    session_unset();
    session_destroy();

    // Show alert and redirect to login page
    echo "<script>alert('You are logged out.'); window.location.href='login.php';</script>";
    exit();
} else {
    header("location:index.php"); // Redirect to home if not logged in
    exit();
}
?>
