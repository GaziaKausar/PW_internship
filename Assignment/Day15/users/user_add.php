<?php
require_once '../config.php';
require_once '../auth.php';
require_once '../functions.php';
check_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    if(!empty($username) && !empty($email) && !empty($password) && !empty($role)) {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $hashed, $role]);
            set_flash_message('success', "Account identity '{$username}' successfully generated.");
            redirect('user_list.php');
        } catch (PDOException $e) {
            $error = "Execution Error: Unique data collision detected.";
        }
    } else {
        $error = "Please fulfill all inputs.";
    }
}
include '../includes/header.php';
include '../includes/navbar.php';
?>
<div class="container" style="max-width:600px;">
    <div class="card shadow border-0">
        <div class="card-body p-4">
            <h4>Provision New User Target</h4>
            <hr>
            <?php if(isset($error)): ?><div class="alert alert-danger"><?= $error; ?></div><?php endif; ?>
            <form action="user_add.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role Privilege Allocation</label>
                    <select name="role" class="form-select">
                        <option value="user">User Clearance</option>
                        <option value="admin">Admin Clearance</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success me-2">Commit Insertion</button>
                    <a href="user_list.php" class="btn btn-light">Abandone</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
