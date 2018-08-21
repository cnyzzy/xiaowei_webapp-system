<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Z60Feed = new Z60Feed($DB);

$NoticeArray1=$Z60Feed->ReceiveGruopList(1);
$NoticeArray2=$Z60Feed->ReceiveGruopList(2);
$NoticeArray3=$Z60Feed->ReceiveGruopList(3);
