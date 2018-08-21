<?php
empty($params[0]) ? $NoticeId = '1' : $NoticeId = $params[0];
$Notice = new Notice($DB);
$NoticeArray=$Notice->ReceiveNotice($NoticeId);
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