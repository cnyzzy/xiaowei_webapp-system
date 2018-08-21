<?php
empty($params[0]) ? $Z60LoveId = '1' : $Z60LoveId = $params[0];
$Z60Love = new Z60Love($DB);
$NoticeArray=$Z60Love->ReceiveZ60Love($Z60LoveId);
if(EMPTY($NoticeArray)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条祝福',
); 
ErrorMsg($Errormsg);

}
if($NoticeArray['dcontent']&&$NoticeArray['dcontent']=='URL'){
 header("Location:".$NoticeArray['content']); 
}