<?php
include 'sql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    // Prepare SQL statement to fetch user data
    $stmt = $conn->prepare("SELECT password, login FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password, $login_token);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Set a session cookie with the login token
            setcookie("login", $login_token, time() + (86400 * 30), "/"); // Expires in 30 days
            echo "Login successful! Cookie set.";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
