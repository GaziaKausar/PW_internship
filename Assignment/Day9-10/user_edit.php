<?php
include "db.php";

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $update_query = "UPDATE users
                     SET name='$name',
                         email='$email',
                         age='$age'
                     WHERE id=$id";

    mysqli_query($conn, $update_query);

    header("Location: user_list.php");
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Edit User</h2>

<form method="POST">

    Name:
    <input type="text" name="name"
           value="<?php echo $row['name']; ?>">

    <br><br>

    Email:
    <input type="email" name="email"
           value="<?php echo $row['email']; ?>">

    <br><br>

    Age:
    <input type="number" name="age"
           value="<?php echo $row['age']; ?>">

    <br><br>

    <input type="submit" name="update" value="Update User">

</form>

</body>
</html>
