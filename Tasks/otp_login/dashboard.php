<?php

session_start();

if(!isset($_SESSION['logged_in'])){
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h2>Welcome</h2>

    <p class="success">
        Login Successful
    </p>

    <a href="logout.php">
        <button>Logout</button>
    </a>

</div>

</body>
</html>