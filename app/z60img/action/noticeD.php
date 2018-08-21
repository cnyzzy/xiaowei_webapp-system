<?php
empty($params[0]) ? $Z60ZwId = '1' : $Z60ZwId = $params[0];
$Z60Zw = new Z60Zw($DB);
$NoticeArray=$Z60Zw->ReceiveZ60Zw($Z60ZwId);
if(EMPTY($NoticeArray)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条征文',
); 
ErrorMsg($Errormsg);

}
if($NoticeArray['dcontent']&&$NoticeArray['dcontent']=='URL'){
 header("Location:".$NoticeArray['content']); 
}