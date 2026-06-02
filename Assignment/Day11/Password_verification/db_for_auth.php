<?php
$host = "localhost";
$db_user = "root"; // Replace with your database username
$db_pass = "";     // Replace with your database password
$db_name = "user_auth_system";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
