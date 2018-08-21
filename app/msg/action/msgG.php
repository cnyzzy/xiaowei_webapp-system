<?php
empty($params[0]) ? $group = '0' : $group = $params[0];
empty($params[1]) ? $choose = '0' : $choose = $params[1];
$Msg = new Msg($DB);
$MsgGroupNum=$Msg->MsgGroupNum($number,$group,$choose);
$GruopListArray=$Msg->ReceiveGruopList($number,$group,$choose);