<?php
include "db.php";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $query = "INSERT INTO users(name, email, age)
              VALUES('$name', '$email', '$age')";

    mysqli_query($conn, $query);

    echo "User Added Successfully";
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Add User</h2>

<form method="POST">

    Name:
    <input type="text" name="name" required>

    <br><br>

    Email:
    <input type="email" name="email" required>

    <br><br>

    Age:
    <input type="number" name="age" required>

    <br><br>

    <input type="submit" name="submit" value="Add User">

</form>

<br>

<a href="user_list.php">View Users</a>

</body>
</html>
