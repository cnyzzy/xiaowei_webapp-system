<?php
empty($params[0]) ? $gcdxyId = '1' : $gcdxyId = $params[0];
$gcdxy = new gcdxy($DB);
$NoticeArray=$gcdxy->Receivegcdxy($gcdxyId);
if(EMPTY($NoticeArray)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条诵读',
); 
ErrorMsg($Errormsg);

}
if($NoticeArray['dcontent']&&$NoticeArray['dcontent']=='URL'){
 header("Location:".$NoticeArray['content']); 
}