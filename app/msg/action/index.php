<?php
empty($params[0]) ? $choose = '0' : $choose = $params[0];
$Msg = new Msg($DB);
$MsgAllNum=$Msg->MsgAllNum($number);
$MsgNum=$Msg->MsgNum($number,$choose);
//PRINT_R($Msg->SendMsg("1","11","TEST","15223232","123456","00000"));
if($MsgNum!=0){
$MsgArray=$Msg->ReceiveGruop($number,$choose);
}
