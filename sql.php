<?php
$servername = "mysql2.serv00.com";
$username = "m6729_bloxera";
$password = "kStnMkz0-4K3OllbRI4c4V}>NlONR_";
$dbname = "m6729_bloxera";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
