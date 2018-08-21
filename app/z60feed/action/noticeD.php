<?php
empty($params[0]) ? $Z60FeedId = '1' : $Z60FeedId = $params[0];
$Z60Feed = new Z60Feed($DB);
$NoticeArray=$Z60Feed->ReceiveZ60Feed($Z60FeedId);
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