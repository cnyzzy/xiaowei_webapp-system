<?php
if($_SESSION['admin']['rightint']<8){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}

$arrWxapi = SetRead('/system/config/Public/Wxaapi.php');
$arrWxapi['time']=time();
empty($_POST['APPID']) ? $arrWxapi['APPID'] = $arrWxapi['APPID'] : $arrWxapi['APPID'] = $_POST['APPID'];
empty($_POST['AppSecret']) ? $arrWxapi['SECRET'] = $arrWxapi['SECRET'] : $arrWxapi['SECRET'] = $_POST['AppSecret'];
empty($_POST['TOKEN']) ? $arrWxapi['TOKEN'] = $arrWxapi['TOKEN'] : $arrWxapi['TOKEN'] = $_POST['TOKEN'];
SetWrite($arrWxapi,'/system/config/Public/Wxaapi.php');
$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],31,3,$_SESSION['admin']['id'],$_SESSION['admin']['rightint']);
header("Location:/admin/wxaapi/1");  
?>