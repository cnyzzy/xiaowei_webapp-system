<?php
empty($params[0]) ? $Z60ysId = '1' : $Z60ysId = $params[0];
$Z60ys = new Z60ys($DB);
$NoticeArray=$Z60ys->ReceiveZ60ys($Z60ysId);
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