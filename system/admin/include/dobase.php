<?php
if($_SESSION['admin']['rightint']<8){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['name']) ? $arrInfo['name'] = $arrInfo['name'] : $arrInfo['name'] = $_POST['name'];
empty($_POST['url']) ? $arrInfo['url'] = $arrInfo['url'] : $arrInfo['url'] = $_POST['url'];
empty($_POST['jwurl']) ? $arrInfo['jwurl'] = $arrInfo['jwurl'] : $arrInfo['jwurl'] = $_POST['jwurl'];
(empty($_POST['open'])&&isset($_POST['name'])) ? $arrInfo['open'] = 0 : $arrInfo['open'] = 1;
SetWrite($arrInfo,'/system/config/Public/Info.php');
$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],61,3,$_SESSION['admin']['id'],$_SESSION['admin']['rightint']);
header("Location:/admin/base/1");  
?>