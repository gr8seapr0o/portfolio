<?php

$num = 55671383857575;
$arr = str_split($num, 1);
$sum = 0;
foreach ($arr as $elem) {
    $sum += intval($elem);
}
echo $sum;
