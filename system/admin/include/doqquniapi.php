<?php
if($_SESSION['admin']['rightint']<8){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}

$arrWxapi = SetRead('/system/config/Public/Qquniapi.php');
$token = SetRead('/system/config/Public/qquniatoken.php');
empty($_POST['pertime']) ? $token['pertime'] = $token['pertime'] : $token['pertime'] = intval($_POST['pertime']);
empty($_POST['APPID']) ? $arrWxapi['APPID'] = $arrWxapi['APPID'] : $arrWxapi['APPID'] = $_POST['APPID'];
empty($_POST['APPKEY']) ? $arrWxapi['APPKEY'] = $arrWxapi['APPKEY'] : $arrWxapi['APPKEY'] = $_POST['APPKEY'];
SetWrite($arrWxapi,'/system/config/Public/Qquniapi.php');
SetWrite($token,'/system/config/Public/qquniatoken.php');
$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],31,3,$_SESSION['admin']['id'],$_SESSION['admin']['rightint']);
header("Location:/admin/qquniapi/1");  
?>