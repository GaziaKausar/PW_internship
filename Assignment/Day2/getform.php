<!DOCTYPE html>
<html>

<body>

<form method="GET">

Name:
<input type="text" name="username">

<input type="submit">

</form>

<?php

if(isset($_GET['username']))
{
    echo "Hello " . $_GET['username'];
}

?>

</body>
</html>
