<?php

echo "<h2>FOR LOOP</h2>";

for($i = 1; $i <= 5; $i++)
{
    echo $i . "<br>";
}


echo "<h2>WHILE LOOP</h2>";

$x = 1;

while($x <= 5)
{
    echo $x . "<br>";
    $x++;
}


echo "<h2>DO-WHILE LOOP</h2>";

$y = 1;

do
{
    echo $y . "<br>";
    $y++;
}
while($y <= 5);


echo "<h2>FOREACH LOOP</h2>";

$colors = ["Red", "Blue", "Green", "Black"];

foreach($colors as $color)
{
    echo $color . "<br>";
}

?>
