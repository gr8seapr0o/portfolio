<?php
$arr = array();
for($i = 0; $i < 4; $i++) {
    $arr[] = mt_rand(1, 100);
}



$a = $arr;
print_r($a);
echo '<br>';
$min = 0;
$max = 0;
$count = count ($a);
// search min and max indexes
for ($i = 1; $i < $count; $i++) {
    if ($a[$i] > $a[$max]) $max = $i;
    if ($a[$i] < $a[$min]) $min = $i;
}
// switch min and max
$a[$min] += $a[$max];
$a[$max] = $a[$min] - $a[$max];
$a[$min] = $a[$min] - $a[$max];
print_r($a);