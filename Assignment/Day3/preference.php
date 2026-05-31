<!DOCTYPE html>
<html>
<body>

<form method="POST">

Select Theme:

<select name="theme">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
</select>

<br><br>

<input type="submit" value="Save">

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    setcookie("theme", $_POST["theme"], time() + 86400);

    echo "Theme saved!";
}

?>

</body>
</html>
