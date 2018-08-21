<?php
empty($params[0]) ? $Z60newsId = '1' : $Z60newsId = $params[0];
$Z60news = new Z60news($DB);
$Array=$Z60news->ReceiveZ60news($Z60newsId);
if(EMPTY($Array)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条新闻',
); 
ErrorMsg($Errormsg);

}
if($Array['dcontent']&&$Array['dcontent']=='URL'){
 header("Location:".$Array['content']); 
}
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
$LikeNum  =$Z60news->LikeNumA($Array['id'],$number);