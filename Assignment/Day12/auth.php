<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if a user is completely logged out
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['role']);
}

// Check if the logged-in individual is an admin
function isAdmin() {
    return isLoggedIn() && $_SESSION['role'] === 'admin';
}

// Check if the logged-in individual is a standard user
function isUser() {
    return isLoggedIn() && $_SESSION['role'] === 'user';
}

// Restrict page access to Admins only
function requireAdmin() {
    if (!isAdmin()) {
        // If not an admin, boot them back to the user dashboard or login
        header("Location: dashboard.php");
        exit;
    }
}

// Restrict page access to Standard Users only
function requireUser() {
    if (!isUser()) {
        header("Location: admin.php");
        exit;
    }
}
?>
