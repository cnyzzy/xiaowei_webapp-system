<?php
$Z60Notice = new Z60Notice($DB);
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
$TotalNum = $Z60Notice->Z60NoticeNumA();
$prePageNum = $TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$Array = $Z60Notice->ReceiveZ60NoticeA($TotalNum,$PerNum,$NOW);