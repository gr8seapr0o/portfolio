<?php
$arr = range(1, 100);

foreach ($arr as $num) {
    if($num%2==0) {
        echo "{$num}<br> ";
    }
}
