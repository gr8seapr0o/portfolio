<?php

$row = 3;
$col = 5;
$colors = array('red','yellow','blue','gray','maroon','brown','green');

?>

<table cellspacing="5">
<?php for($i = 1; $i <= $row; $i++) { ?>
    <tr>
        <?php for($j = 1; $j <= $col; $j++) { ?>
        <td style="background: <?= $colors[rand(0, 6)]; ?>"><?= rand(); ?></td>
        <?php } ?>
    </tr>
    <?php } ?>


</table>
