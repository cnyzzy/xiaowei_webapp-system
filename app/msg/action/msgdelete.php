<?php
empty($params[0]) ? $msgid = '0' : $msgid = $params[0];
$Msg = new Msg($DB);
$MsgArr = $Msg->ReceiveMsg($msgid);
if($MsgArr){
	if($MsgArr['tonumber']!=$_SESSION['zid']['number']){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '非法操作',
); 
ErrorMsg($Errormsg);
}else{
if($Msg->DeleteMsg($msgid)){	 
header("Location:/msg"); 
}ELSE{
$Errormsg=array (
  'error_type' => '提示',
  'msg' => '删除失败',
); 
ErrorMsg($Errormsg);	
}
}
}else{
$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有此条消息',
); 
ErrorMsg($Errormsg);	
}