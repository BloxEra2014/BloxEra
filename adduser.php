<?php
include 'sql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate username (only English letters and numbers)
    if (!preg_match('/^[A-Za-z0-9]+$/', $username)) {
        die("Error: Username can only contain English letters and numbers.");
    }

    // Validate input
    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Generate a unique login token
    $login_token = bin2hex(random_bytes(32));

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password, login) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $login_token);

    if ($stmt->execute()) {
        // Set a cookie for user session
        setcookie("login", $login_token, time() + (86400 * 30), "/"); // Expires in 30 days
        echo "User registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
