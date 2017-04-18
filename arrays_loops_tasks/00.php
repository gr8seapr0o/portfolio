<?php
$arrayInteger = range(0, 9, 1);
var_dump($arrayInteger);
$integer = 4;
?>
<table border="1" cellpadding="5">
    <thead>
    <tr>
        <th colspan="11" align="center">Таблица пифагора</th>
    </tr>
    <tr>
        <th></th>
        <th><?= implode('</th><th>', $arrayInteger) ?></th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($arrayInteger as $itemRow) { ?>
    <?php if($itemRow) { ?>
    <tr>
        <td align="center"><b><?=$itemRow ?></b></td>
        <?php for($i = 0; $i < 10; $i++) { ?>
        <td align="center"><?=(int)"{$itemRow}{$i}" * (int)"{$itemRow}{$i}" ?></td>
    <?php } ?>
    </tr>
    <?php } ?>
<?php } ?>
    </tbody>

</table>
