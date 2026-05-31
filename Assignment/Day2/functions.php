<?php

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


function validateInput($data)
{
    if(empty($data))
    {
        return "Input field is empty";
    }
    else
    {
        return "Valid Input";
    }
}


/* Testing the functions */

$name = "   Gazia   ";

$cleanName = sanitizeInput($name);

echo "Sanitized Input: " . $cleanName . "<br><br>";

echo validateInput($cleanName);

?>
