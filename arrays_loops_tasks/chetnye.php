<?php

$s =1000;
$arr = array();
for ($i = 2; $i <= $s;$i++){
    for($j =2; $j<$i;$j++){
        if($i%$j == 0){
            break;
        }
        else{
            $arr[] = $i;
            break;
        }
    }
    var_dump($arr);
}