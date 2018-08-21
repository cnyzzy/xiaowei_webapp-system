<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Z60Zw = new Z60Zw($DB);
$NoticeNum=$Z60Zw->Z60ZwGroupNum($NoticeW);
if($NoticeNum!=0){
$NoticeArray1=$Z60Zw->ReceiveGruopList(1);
$NoticeArray2=$Z60Zw->ReceiveGruopList(2);

}