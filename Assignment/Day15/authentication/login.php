<?php
require_once '../config.php';
require_once '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            redirect("../dashboard/" . $user['role'] . "_dashboard.php");
        } else { $error = "Invalid combination credentials."; }
    } else { $error = "Complete all entry requirements."; }

    // ... after verifying the password is correct ...
if ($user && password_verify($password, $user['password'])) {
    // 1. Store user data in the session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role']; // Crucial: Store 'admin' or 'user'

    // 2. Redirect based on their role
    if ($user['role'] === 'admin') {
        redirect('dashboard/admin_dashboard.php');
    } else {
        redirect('dashboard/user_dashboard.php');
    }
    exit;
}
}
include '../includes/header.php';
include '../includes/navbar.php';
?>
<div class="container my-auto" style="max-width: 440px;">
    <div class="mb-3"><?php display_flash_message(); ?></div>
    <div class="card shadow-lg p-4 border-0">
        <div class="text-center mb-4">
            <h3 class="fw-bold mb-1">Welcome Back</h3>
            <p class="text-muted small">Please sign in to access your dashboard account</p>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger border-0 py-2 small" role="alert"><?= $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                <label for="floatingEmail">Email Address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-medium">
                Sign In
            </button>
        </form>
        <p class="text-center mt-4 mb-0 text-muted small">
            Don't have an account? <a href="register.php" class="text-decoration-none fw-medium text-primary">Register Here</a>
        </p>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
