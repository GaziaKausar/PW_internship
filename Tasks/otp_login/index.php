<!DOCTYPE html>
<html>
<head>
    <title>Email OTP Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Email OTP Login</h2>

    <form action="register.php" method="POST">

        <input
            type="email"
            name="email"
            placeholder="Enter Email"
            required
        >

        <button type="submit" name="send_otp">
            Send OTP
        </button>

    </form>

</div>

</body>
</html>