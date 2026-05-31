<!DOCTYPE html>
<html>
<body>

<form method="POST">

Username:
<input type="text" name="username">

<br><br>

<input type="submit" value="Login">

</form>

<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $_SESSION["username"] = $_POST["username"];

    echo "Welcome " . $_SESSION["username"];
}

?>

</body>
</html>
