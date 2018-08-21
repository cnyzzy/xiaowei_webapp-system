<?php
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
if($_SESSION['admin']['rightint']<7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 

switch($ch){
	case "update":
$Wx = new Wx();
$data =$Wx-> GetReplyRule();
SetWrite( $data,'/system/config/Public/wxre.php');
		echo '1';	
		break;
default:
		echo'0';
}}
?>