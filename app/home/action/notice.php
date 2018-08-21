<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Notice = new Notice($DB);
$NoticeNum=$Notice->NoticeGroupNum($NoticeW);
if($NoticeNum!=0){
$NoticeArray=$Notice->ReceiveGruopList($NoticeW);
}