<?php
empty($params[0]) ? $ShijiId = '1' : $ShijiId = $params[0];
$Shiji = new Shiji($DB);
if(!is_numeric( $ShijiId)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '非法数值',
); 
ErrorMsg($Errormsg);

}
$Array=$Shiji->ReceiveShiji($ShijiId);
if(EMPTY($Array)){

		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条',
); 
ErrorMsg($Errormsg);

}
		   	$num = $Shiji->LikeNumA($ShijiId,$number);
if($ShijiId!='0'&&$num!=0)$Array['iszan']=1;
