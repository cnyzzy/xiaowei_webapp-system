<?php
$Z60Love = new Z60Love($DB);
$NoticeNum=$Z60Love->Z60LoveGroupNum();

if($NoticeNum!=0){
$NoticeArray1=$Z60Love->ReceiveNewZ60loveA($NoticeNum,10,1);
foreach ($NoticeArray1 as $key=>$arr) { 
	$num = $Z60Love->LikeNumA($arr['id'],$number);
if($arr['id']!='0'&&$num!=0)$NoticeArray1[$key]['iszan']=1;
}
}