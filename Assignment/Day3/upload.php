<!DOCTYPE html>
<html>
<body>

<form method="POST" enctype="multipart/form-data">

Select File:
<input type="file" name="file">

<br><br>

<input type="submit" value="Upload">

</form>

<?php

if(isset($_FILES['file']))
{
    $filename = $_FILES['file']['name'];

    echo "Uploaded File: " . $filename;
}

?>

</body>
</html>
