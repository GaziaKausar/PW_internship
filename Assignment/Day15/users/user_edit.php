<?php
require_once '../config.php';
require_once '../auth.php';
require_once '../functions.php';
check_admin();

if (!isset($_GET['id'])) { redirect('user_list.php'); }
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
if (!$user) { redirect('user_list.php'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $role     = $_POST['role'];

    if (!empty($username) && !empty($email) && !empty($role)) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
            $stmt->execute([$username, $email, $role, $id]);
            set_flash_message('success', "Target records for unit ID {$id} modified safely.");
            redirect('user_list.php');
        } catch (PDOException $e) {
            $error = "Modification blocked: Unique indexing key collision.";
        }
    }
}
include '../includes/header.php';
include '../includes/navbar.php';
?>
<div class="container" style="max-width:600px;">
    <div class="card shadow border-0">
        <div class="card-body p-4">
            <h4>Modify Account Record System</h4>
            <hr>
            <?php if(isset($error)): ?><div class="alert alert-danger"><?= $error; ?></div><?php endif; ?>
            <form action="user_edit.php?id=<?= $id; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" value="<?= sanitize($user['username']); ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="<?= sanitize($user['email']); ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Access Clearance Level</label>
                    <select name="role" class="form-select">
                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User Clearance</option>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin Clearance</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-warning me-2">Apply Mutations</button>
                    <a href="user_list.php" class="btn btn-light">Abandone</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
