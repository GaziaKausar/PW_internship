<?php
// users/user_delete.php
require_once '../config.php';
require_once '../auth.php';
require_once '../functions.php';
check_admin();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prevent an admin from accidentally deleting their own logged-in session
    if ($id == $_SESSION['user_id']) {
        set_flash_message('danger', 'Destruction denied: You cannot remove your current active terminal profile.');
    } else {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        set_flash_message('success', 'User execution processed successfully.');
    }
}
redirect('user_list.php');
?>
