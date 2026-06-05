<?php
// auth.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Restrict access to logged-in users only
function check_logged_in() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../authentication/login.php");
        exit();
    }
}

// Restrict access to Admins only
function check_admin() {
    check_logged_in();
    if ($_SESSION['role'] !== 'admin') {
        header("Location: ../dashboard/user_dashboard.php");
        exit();
    }
}
?>
