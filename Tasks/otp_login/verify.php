<?php

session_start();

require 'db.php';

if(!isset($_SESSION['email'])){
    header("Location:index.php");
}

$email = $_SESSION['email'];

$message = "";

if(isset($_POST['verify'])){

    $otp = $_POST['otp'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE email='$email'
         AND otp='$otp'"
    );

    if(mysqli_num_rows($query) > 0){

        mysqli_query(
            $conn,
            "UPDATE users
             SET is_verified=1,
             otp=NULL
             WHERE email='$email'"
        );

        $_SESSION['logged_in'] = true;

        header("Location:dashboard.php");

    } else {

        $message = "Invalid OTP";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Verify OTP</h2>

    <p class="error">
        <?php echo $message; ?>
    </p>

    <form method="POST">

        <input
            type="text"
            name="otp"
            maxlength="6"
            placeholder="Enter OTP"
            required
        >

        <button
            type="submit"
            name="verify"
        >
            Verify OTP
        </button>

    </form>

</div>

</body>
</html>
