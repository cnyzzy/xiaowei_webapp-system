<?php
$PerNum=20;
$NOW = empty($params[0]) ? 1:($params[0]);
$NOWL = $NOW-1;
$NOWLL = $NOW-2;
$NOWLLL = $NOW-3;
$NOWLLLL = $NOW-4;
$NOWR = $NOW+1;
$NOWRR = $NOW+2;
$NOWRRR = $NOW+3;
$NOWRRRR = $NOW+4;
$Mjw = new Mjw($DB);
$TotalNum = $Mjw->JwinfoNum('0 or 1');
$prePageNum = $TotalNum>$PerNum?ceil($TotalNum/$PerNum):1;
$Array = $Mjw->ReceiveInfo($TotalNum,$PerNum,$NOW,'0 or 1');