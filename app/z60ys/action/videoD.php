<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Z60ys = new Z60ys($DB);
$NoticeArray=$Z60ys->ReceiveZ60ys($NoticeW);
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
$d=json_decode($NoticeArray['dcontent'],true);
$NoticeArray['dcontent']=$d['dcontent'];
$NoticeArray['smallimg']=$d['smallimg'];