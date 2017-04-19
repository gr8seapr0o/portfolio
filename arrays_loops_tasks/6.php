<?php
$arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
$en = array();
$ru = array();
foreach ($arr as $key=>$elem) {
        $en[] = $key;
        $ru[] = $elem;
}
echo '<pre>';
var_dump($en);
var_dump($ru);
echo '</pre>';
