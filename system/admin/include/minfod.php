<?php
empty($params[1]) ? $ok = '0' : $ok = $params[1];
$Mjw = new Mjw($DB);
$id = empty($params[0]) ? 0:($params[0]);
if($id!=0)$Array = $Mjw->GetJwinfo($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}
if(@$_SESSION['admin']['ysquan']=='1'){
	if($_SESSION['admin']['rightint']<8){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
}else{$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],43,5,$id,$_SESSION['admin']['rightint']);
}
}