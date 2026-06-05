<?php

require_once '../config.php';
require_once '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        // Hash password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
            $stmt->execute([$username, $email, $hashed_password]);
            set_flash_message('success', 'Registration successful! Please login.');
            redirect('login.php');
        } catch (PDOException $e) {
            $error = ($e->getCode() == 23000) ? 'Username or Email already registered.' : 'Registration error.';
        }
    } else {
        $error = 'Please fill out all fields.';
    }
} 


include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container" style="max-width: 450px;">
    <div class="card shadow border-0 mt-5">
        <div class="card-body p-4">
            <h3 class="card-title text-center mb-4">Create Account</h3>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="register.php" method="POST">
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
                
                <button type="submit" class="btn btn-success w-100 mt-2">Sign Up</button>
            </form>
            
            <p class="text-center mt-3 mb-0"><small>Have an account? <a href="login.php">Log In</a></small></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
