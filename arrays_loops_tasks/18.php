<?php
$arr = [
    'воскресенье',
    'понедельник',
    'вторник',
    'среда',
    'четверг',
    'пятница',
    'суббота',
    ];
foreach ($arr as $key=>$elem) {
    if($key== 0 || $key == 6) {
        echo "<strong>{$elem}</strong><br> ";
    } else {
        echo $elem . '<br>';
    }
}
