<?php

// Start the session if it hasn't been started in your config/functions files
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../auth.php';
require_once '../functions.php';

check_admin(); // Security gateway

include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Admin Management Command</h1>
            <div class="p-5 bg-white border rounded shadow-sm mb-4">
                <h2>Hello, Admin <?= sanitize($_SESSION['username']); ?>!</h2>
                <p class="text-muted">You hold structural rights to modify records, manipulate system metrics, and audit entries.</p>
                <div class="row mt-4 gap-3 gap-md-0">
                    <div class="col-md-6">
                        <div class="card border-primary text-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">User Master Ledger</h5>
                                <p class="card-text">Oversee profiles, assign security roles, and wipe records.</p>
                                <a href="../users/user_list.php" class="btn btn-primary">Open User Directory</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success text-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Registration Engine</h5>
                                <p class="card-text">Directly spawn a pre-validated profile identity.</p>
                                <a href="../users/user_add.php" class="btn btn-success">Provision New User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
