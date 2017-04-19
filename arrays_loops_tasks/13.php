<?php
$arr = range(1, 9);

for($i = 1; $i <= 9; $i++) {
    for($j = 1; $j <= 9; $j++) {
        $res = $i * $j;
        echo $res . "  ";
    }
    echo "<br>";

}