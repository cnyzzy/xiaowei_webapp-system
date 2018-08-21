<?php
empty($params[2]) ? $ok = '0' : $ok = $params[2];
$Z60Notice = new Z60Notice($DB);
$id = empty($bbb) ? 0:($bbb);
if($id!=0)$Array = $Z60Notice ->GetZ60NoticeA($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}