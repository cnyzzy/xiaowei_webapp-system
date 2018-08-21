<?php
if($_SESSION['admin']['rightint']<7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($params[1]) ? $ok = '0' : $ok = $params[1];
$Mjw = new Mjw($DB);
$id = empty($params[0]) ? 0:($params[0]);
if($id!=0)$Array = $Mjw->GetWxid($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}