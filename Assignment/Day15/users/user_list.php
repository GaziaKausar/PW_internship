<?php
require_once '../config.php';
require_once '../auth.php';
require_once '../functions.php';
check_admin();

$stmt = $pdo->query("SELECT id, username, email, role, created_at FROM users ORDER BY id DESC");
$users = $stmt->fetchAll();

include '../includes/header.php';
include '../includes/navbar.php';
?>
<div class="container py-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1 text-dark">User Master Directory</h2>
            <p class="text-muted small mb-0">System configuration terminal for system access provisioning and authorization states.</p>
        </div>
        <a href="user_add.php" class="btn btn-success d-flex align-items-center px-4 py-2 rounded-3 fw-medium shadow-sm">
             Deploy System Profile
        </a>
    </div>

    <?php display_flash_message(); ?>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">UID</th>
                        <th class="py-3">Profile Identity</th>
                        <th class="py-3">Email Address</th>
                        <th class="py-3">Clearance Access</th>
                        <th class="py-3">Registration Date</th>
                        <th class="pe-4 py-3 text-end">Operational Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u): ?>
                    <tr>
                        <td class="ps-4 fw-medium text-muted">#<?= $u['id']; ?></td>
                        <td>
                            <div class="fw-semibold text-dark"><?= sanitize($u['username']); ?></div>
                        </td>
                        <td class="text-secondary small"><?= sanitize($u['email']); ?></td>
                        <td>
                            <?php if ($u['role'] === 'admin'): ?>
                                <span class="badge bg-danger-subtle text-danger px-2.5 py-1.5 rounded-pill border border-danger-subtle small fw-semibold">ADMIN</span>
                            <?php else: ?>
                                <span class="badge bg-secondary-subtle text-secondary px-2.5 py-1.5 rounded-pill border border-secondary-subtle small fw-semibold">USER</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted small"><?= date('M d, Y', strtotime($u['created_at'])); ?></td>
                        <td class="pe-4 text-end">
                            <div class="btn-group rounded-2 shadow-sm">
                                <a href="user_edit.php?id=<?= $u['id']; ?>" class="btn btn-sm btn-white border border-end-0 text-warning fw-medium px-3">Modify</a>
                                <a href="user_delete.php?id=<?= $u['id']; ?>" class="btn btn-sm btn-white border text-danger fw-medium px-3" onclick="return confirm('Purge profile records?');">Remove</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
