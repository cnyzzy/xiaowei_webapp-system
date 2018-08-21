<?php
$intint=$_SESSION['admin']['rightint'];
if($intint<6){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Admin = new Admin($DB);
$Mapp = new Mapp($DB);
$appname = $_POST['appname'];

if($_SESSION['admin']['rightint']<7&&(strtolower(substr($appname, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "install":
		$Admin-> InstallApp($appname, $Mapp);
		echo '1';	
		break;
	case "uninstall":
		$Admin-> UnInstallApp($appname, $Mapp);
		echo '1';	
		break;
	case "isopen":
		$Admin-> OpenApp($appname);
		echo '1';	
		break;
	case "admin":
		echo $Admin-> AdminAppUrl($appname);	
break;	}
?>