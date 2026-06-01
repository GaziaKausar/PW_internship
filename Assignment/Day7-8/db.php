<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "intern_db";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn)
{
    die("Connection failed");
}

?>
