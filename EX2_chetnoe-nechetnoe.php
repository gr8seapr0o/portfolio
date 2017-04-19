<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$arr = [1, 2, 7, 4, 9, 5, 6, 10];
sort($arr);
var_dump($arr);
$i = 0;
$j = 0;
$k = '';
while ($i < (count($arr)- 1))
{
    if($arr[$i] % 2 !== 0 ) {
        $arr1[$j]['odd'] = $arr[$i];
    } else {
        $arr1[$j]['odd'] = $k;
    }
    $i++;
    if($arr[$i] % 2 == 0) {
        $arr1[$j]['even'] = $arr[$i];
    } else {
        $arr1[$j]['even'] = $k;
    }
if ($arr1[$j]['even'] &&  $arr1[$j]['odd'] == $k )
    $arr1[$j]['sum'] = $arr1[$j]['odd'] + $arr1[$j]['even'];

    $j++;
}

var_dump($arr1);