<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Z60Notice = new Z60Notice($DB);
$NoticeNum=$Z60Notice->Z60NoticeGroupNum($NoticeW);
if($NoticeNum!=0){
$NoticeArray1=$Z60Notice->ReceiveGruopList(1);
$NoticeArray2=$Z60Notice->ReceiveGruopList(2);

}