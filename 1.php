<?php
$arr = [1, 2, 7, 4, 9, 5, 6, 10];
sort($arr);
var_dump($arr);
$i = 0;
$j =0;
while ($i <= (count($arr)-1))
{
    if($arr[$i] % 2 !== 0 ) {
        $arr1[$j]['odd'] = $arr[$i];
    } else {
        $arr1[$j]['odd'] = null;
    }
    $i++;
    if($arr[$i] % 2 == 0) {
        $arr1[$j]['even'] = $arr[$i];
    } else {
        $arr1[$j]['even'] = null;
    }

    $arr1[$j]['sum'] = $arr1[$j]['odd'] + $arr1[$j]['even'];

    $j++;
}

var_dump($arr1);

