<?php
require_once 'functions.php';
if (isset($_SESSION['user_id'])) {
    redirect("dashboard/" . $_SESSION['role'] . "_dashboard.php");
}
include 'includes/header.php';
include 'includes/navbar.php';
?>
<div class="container my-auto py-5">
    <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-8">
            <span class="badge bg-light text-primary border border-primary-subtle px-3 py-2 rounded-pill mb-3 fw-medium">Internship Assignment Deliverable</span>
            <h1 class="display-4 fw-extrabold tracking-tight text-slate-900 mb-3">
                Secure Role-Based Student Portal
            </h1>
            <p class="lead text-muted mx-auto mb-4 style='max-width: 600px;'">
                An elegant application managing system records safely with complete role separation, optimized operations, and seamless data visualization.
            </p>
            <div class="d-sm-flex justify-content-center gap-3">
                <a href="authentication/login.php" class="btn btn-primary btn-lg px-5 py-3 rounded-3 shadow-sm fw-medium fs-6">
                    Access Dashboard
                </a>
                <a href="authentication/register.php" class="btn btn-light btn-lg px-5 py-3 rounded-3 border fw-medium fs-6">
                    Create Portal Account
                </a>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
