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

//по решету Эратосфена


define("LIMIT", 1000);
define("SQRT_LIMIT",floor(sqrt(LIMIT)));

$s = array_fill(2,LIMIT-1,true);

for($i=2;$i<=SQRT_LIMIT;$i++){
if($s[$i]===true){
for($j=$i*$i; $j<=LIMIT; $j+=$i){
$s[$j]=false;
}
}
}
for($n=2; $n<=count($s); $n++)
{
if($s[$n]) 
{
echo ' '.$n; 
}
}
