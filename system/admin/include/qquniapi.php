<?php
empty($params[0]) ? $ok = '0' : $ok = $params[0];
$arrQquniapi = SetRead('/system/config/Public/Qquniapi.php');
$token = SetRead('/system/config/Public/qquniatoken.php');
if($_SESSION['admin']['rightint']<8){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
if($ok == '0' )$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],31,5,$_SESSION['admin']['id'],$_SESSION['admin']['rightint']);
