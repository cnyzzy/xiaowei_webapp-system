<?php
empty($params[0]) ? $id = '0' : $id = $params[0];
$Msg = new Msg($DB);
$MsgArr = $Msg->ReceiveMsg($id);
if($MsgArr){
		if($MsgArr['tonumber']!=$_SESSION['zid']['number']){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '非法操作',
); 
ErrorMsg($Errormsg);
}
	if($MsgArr['isview']==0)$Msg->ViewMsg($id);
 if($MsgArr['tourl']){
	 header("Location:".$MsgArr['tourl']); 
 }
}else{

header("Location:/msg"); 

}