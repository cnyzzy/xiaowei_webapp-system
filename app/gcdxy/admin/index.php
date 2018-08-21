<?php
$gcdxy = new gcdxy($DB);
$PerNum=20;
$NOW = empty($params[3]) ? 1:($params[3]);;
$NOWL = $NOW-1;
$NOWLL = $NOW-2;
$NOWLLL = $NOW-3;
$NOWLLLL = $NOW-4;
$NOWR = $NOW+1;
$NOWRR = $NOW+2;
$NOWRRR = $NOW+3;
$NOWRRRR = $NOW+4;
$TotalNum = $gcdxy->gcdxyNumA();
$prePageNum = $TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$Array = $gcdxy->ReceivegcdxyA($TotalNum,$PerNum,$NOW);