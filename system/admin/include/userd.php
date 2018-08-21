<?php
empty($params[1]) ? $ok = '0' : $ok = $params[1];
$Admin = new Admin($DB);
$id = empty($params[0]) ? 0:($params[0]);
if($id!=0)$Array = $Admin->GetUser($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}
$nowright=$Admin->GetRight($_SESSION['admin']['id']);
IF($nowright['rightint'] <= $Array['rightint'] || $nowright<=7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足。不能修改同等级或以上的账号',
); 
ErrorMsg($Errormsg);	}