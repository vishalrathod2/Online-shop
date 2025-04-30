<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'footwear');

// Enable MySQLi error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($con === false) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Sanitize and validate form data
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$message = mysqli_real_escape_string($con, $_POST['message']);

// Prepare the SQL statement
$sql = "INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)";

// Prepare and execute the statement
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $subject, $message);

if (mysqli_stmt_execute($stmt)) {
    header("Location: contact.php");
} else {
    echo "Error: " . mysqli_error($con);
}

// Close connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
