<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Z60news = new Z60news($DB);
$NEWSNum=$Z60news->Z60newsNum();
if($NEWSNum!=0){
	$NEWSNum1=$Z60news->Z60newsGroupNum(2);

	if($NEWSNum1!=0){
		$Array1=$Z60news->ReceiveZ60newsAGroup($NEWSNum,25,1,2);}



}
