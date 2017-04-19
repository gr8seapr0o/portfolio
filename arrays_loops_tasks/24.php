<?php

$num = 122323424;
$data = (string)$num;
$m = 3;

foreach (count_chars($data, 1) as $i => $val) {
    if(chr($i) == $m) {
        echo "\"", chr($i), "\" встречается в строке $val раз(а).\n";
    }
}
var_dump(count_chars($data, 1));