<?php
empty($params[2]) ? $ok = '0' : $ok = $params[2];
$Cjhd = new Cjhd($DB);
$id = empty($bbb) ? 0:($bbb);
if($id!=0)$Array = $Cjhd ->GetCjhdA($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}
if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}