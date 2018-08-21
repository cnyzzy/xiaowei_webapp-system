<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
	if(empty($_SESSION['zid']['number'])){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '您还没有绑定，请绑定后再次操作',
); 
ErrorMsg($Errormsg);
	}	
empty($params[0]) ? $LId = '1' : $LId = $params[0];
define('URL',$arrInfo['jwurl']);
