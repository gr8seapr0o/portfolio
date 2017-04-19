<?php
$arr = array();
for($i = 0; $i < 5; $i++) {
    $arr[] = mt_rand(1, 100);
}
print_r($arr);
echo   '<br>';
$arr2 = array();
foreach ($arr as $key => $elem) {
    if($arr[$key] > 0 && $key % 2 == 0  && $key !== 0) $arr2[] = $arr[$key];
    if($arr[$key] > 0 && $key % 2 !== 0) echo $arr[$key] . '<br>';
}
var_dump($arr2);
print array_product($arr2);