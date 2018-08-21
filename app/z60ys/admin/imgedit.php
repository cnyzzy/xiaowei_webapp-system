<?php
empty($params[2]) ? $ok = '0' : $ok = $params[2];
$Z60ys = new Z60ys($DB);
$id = empty($bbb) ? 0:($bbb);
if($id!=0)$Array = $Z60ys ->GetZ60ysA($id);
$d=json_decode($Array['dcontent'],true);
$Array['dcontent']=$d['dcontent'];
$Array['smallimg']=$d['smallimg'];

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