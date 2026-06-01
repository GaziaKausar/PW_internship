<!DOCTYPE html>
<html>

<body>

<form method="POST">

Name:
<input type="text" name="name">

<br><br>

Age:
<input type="number" name="age">

<br><br>

City:
<input type="text" name="city">

<br><br>

<input type="submit">

</form>

<?php

if(isset($_POST['name']))
{
    echo "<h3>User Details</h3>";

    echo "Name: " . $_POST['name'] . "<br>";
    echo "Age: " . $_POST['age'] . "<br>";
    echo "City: " . $_POST['city'];
}

?>

</body>
</html>
