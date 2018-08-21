<?php
$NOW = empty($params[0]) ? 1:($params[0]);
$NOWL = $NOW-1;
$NOWLL = $NOW-2;
$NOWR = $NOW+1;
$NOWRR = $NOW+2;
$Mjw = new Mjw($DB);
$TotalNum=$Mjw-> WxidNum(1);
$Array=$Mjw-> ReceiveWxid($TotalNum,$PerNum=1,$NOW,'1');