<?php
require_once '../auth.php';
require_once '../functions.php';
check_logged_in(); // Base security gateway

include '../includes/header.php';
include '../includes/navbar.php';
?>
<div class="container">
    <div class="p-5 bg-white border rounded shadow-sm">
        <h1 class="display-6 text-dark fw-bold">User Space Workspace</h1>
        <p class="text-secondary">Welcome back, <strong><?= sanitize($_SESSION['username']); ?></strong>! Your standard user access session is active.</p>
        <hr class="my-4">
        <div class="alert alert-info" role="alert">
            <strong>Privilege Level:</strong> Standard Reader. Contact system administration if administrative data manipulation functions are required.
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
