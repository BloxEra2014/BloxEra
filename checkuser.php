<?php
include 'sql.php'; // Connect to the database

if (!isset($_COOKIE['login'])) {
    // Redirect to signup.php if no login cookie is found
    header("Location: signup.php");
    exit();
}

$login_token = $_COOKIE['login'];

// Prepare and execute SQL query to verify login token
$stmt = $conn->prepare("SELECT id FROM users WHERE login = ?");
$stmt->bind_param("s", $login_token);
$stmt->execute();
$stmt->store_result();

// Check if a user with this login token exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id);
    $stmt->fetch();
} else {
    // Invalid or expired login token, redirect to signup
    header("Location: signup.php");
    exit();
}

$stmt->close();
$conn->close();
?>
