<?php
require_once 'auth.php'; // Includes session_start() and role functions

// This function ensures only standard users can view this page. 
// Admins will be redirected to admin.php.
requireUser(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Role: <strong>Standard User</strong></p>
    <p>You have logged in successfully to the user area.</p>
    
    <hr>
    <a href="logout.php">Logout</a>
</body>
</html>
