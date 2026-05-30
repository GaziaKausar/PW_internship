<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "otp_login_system"
);

if(!$conn){
    die("Database Connection Failed");
}

?>