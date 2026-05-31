<!DOCTYPE html>
<html>
<head>
    <title>Register Mock</title>

    <style>
        table{
            border-collapse: collapse;
            width: 50%;
        }

        table, th, td{
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>

<h2>Registration Form</h2>

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

    City:
    <input type="text" name="city" required>

    <br><br>

    <input type="submit" value="Register">

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Associative Array
    $user = array(
        "Name"  => $_POST["name"],
        "Email" => $_POST["email"],
        "Age"   => $_POST["age"],
        "City"  => $_POST["city"]
    );

    echo "<h2>User Details</h2>";

    echo "<table>";

    echo "<tr>
            <th>Field</th>
            <th>Value</th>
          </tr>";

    // Display array data
    foreach($user as $key => $value)
    {
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$value</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>

</body>
</html>
