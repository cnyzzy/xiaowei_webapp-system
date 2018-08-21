<?php
empty($params[1]) ? $ok = '0' : $ok = $params[1];

$id = $_SESSION['admin']['id'];
if($id!=0)$Array = $Admin->GetUser($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}