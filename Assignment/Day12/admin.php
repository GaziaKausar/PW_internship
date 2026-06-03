<?php
require_once 'auth.php';
requireAdmin(); // Guards the page immediately
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Control Panel</title>
</head>
<body>
    <h2 style="color: darkred;">Admin Dashboard</h2>
    <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! You have system administrative privileges.</p>
    
    <hr>
    <h3>Administrative Actions</h3>
    <ul>
        <li>Manage System Users</li>
        <li>View Database Application Logs</li>
        <li>System Configurations</li>
    </ul>
    
    <br>
    <a href="logout.php">Secure Logout</a>
</body>
</html>
