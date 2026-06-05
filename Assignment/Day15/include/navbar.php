<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$base_url = "/intern_app/";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary sticky-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold text-white tracking-tight" href="<?= $base_url; ?>index.php">
            <span class="bg-primary text-white px-2 py-1 rounded me-2 fs-6">I</span> InternApp
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3" href="<?= $base_url; ?>dashboard/<?= $_SESSION['role']; ?>_dashboard.php">Dashboard</a>
                    </li>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3" href="<?= $base_url; ?>users/user_list.php">Manage Directory</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item ms-2">
                        <a class="btn btn-sm btn-outline-danger px-3 rounded-pill" href="<?= $base_url; ?>authentication/logout.php">
                            Sign Out (<?= htmlspecialchars($_SESSION['username']); ?>)
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3" href="<?= $base_url; ?>authentication/login.php">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-sm btn-primary px-4 rounded-pill" href="<?= $base_url; ?>authentication/register.php">Get Started</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
