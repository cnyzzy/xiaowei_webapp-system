<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
	if(empty($_SESSION['zid']['number'])){
		$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => '����û�а󶨣���󶨺��ٴβ���',
); 
ErrorMsg($Errormsg);
	}	
empty($params[0]) ? $LId = '1' : $LId = $params[0];
define('URL',$arrInfo['jwurl']);
