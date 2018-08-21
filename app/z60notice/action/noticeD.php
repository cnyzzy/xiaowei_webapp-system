<?php
empty($params[0]) ? $Z60NoticeId = '1' : $Z60NoticeId = $params[0];
$Z60Notice = new Z60Notice($DB);
$NoticeArray=$Z60Notice->ReceiveZ60Notice($Z60NoticeId);
if(EMPTY($NoticeArray)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条公告',
); 
ErrorMsg($Errormsg);

}
if($NoticeArray['dcontent']&&$NoticeArray['dcontent']=='URL'){
 header("Location:".$NoticeArray['content']); 
}