<?php
$number = 1;
$power = 2;
for ($i = 0; $i != 5; $i++)
{
    echo '2^'.$number.'=';
    echo $power.' ';
    $power *= 2;

    $number++;
}