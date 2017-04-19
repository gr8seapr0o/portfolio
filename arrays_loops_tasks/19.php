<?php
$arr = [
    'понедельник',
    'вторник',
    'среда',
    'четверг',
    'пятница',
    'суббота',
    'воскресенье',
];
$day = date('w') + 6;
foreach ($arr as $key=>$elem) {
    if($key == $day) {
        echo "<i>{$elem}</i> ";
    } else {
        echo $elem . ' ';
    }
}